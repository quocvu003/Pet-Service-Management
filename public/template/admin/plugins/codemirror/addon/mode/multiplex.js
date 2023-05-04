// CodeMirror, copyright (c) by Marijn Haverbeke and others
// Distributed under an MIT license: https://codemirror.net/LICENSE

(function(mod) {
  if (typeof exports == "object" && typeof module == "object") // CommonJS
    mod(require("../../lib/codemirror"));
  else if (typeof define == "function" && define.amd) // AMD
    define(["../../lib/codemirror"], mod);
  else // Plain browser env
    mod(CodeMirror);
})(function(CodeMirror) {
"use strict";

CodeMirror.multiplexingMode = function(outer /*, others */) {
  // Others should be {open, close, mode [, delimStyle] [, innerStyle] [, parseDelimiters]} objects
  var others = Array.prototype.slice.call(arguments, 1);

  function indexOf(string, pattern, from, returnEnd) {
    if (typeof pattern == "string") {
      var found = string.indexOf(pattern, from);
      return returnEnd && found > -1 ? found + pattern.length : found;
    }
    var m = pattern.exec(from ? string.slice(from) : string);
    return m ? m.index + from + (returnEnd ? m[0].length : 0) : -1;
  }

  return {
    startState: function() {
      return {
        outer: CodeMirror.startState(outer),
        innertrangthai: null,
        inner: null,
        startingInner: false
      };
    },

    copyState: function(state) {
      return {
        outer: CodeMirror.copyState(outer, state.outer),
        innertrangthai: state.innertrangthai,
        inner: state.innertrangthai && CodeMirror.copyState(state.innertrangthai.mode, state.inner),
        startingInner: state.startingInner
      };
    },

    token: function(stream, state) {
      if (!state.innertrangthai) {
        var cutOff = Infinity, oldContent = stream.string;
        for (var i = 0; i < others.length; ++i) {
          var other = others[i];
          var found = indexOf(oldContent, other.open, stream.pos);
          if (found == stream.pos) {
            if (!other.parseDelimiters) stream.match(other.open);
            state.startingInner = !!other.parseDelimiters
            state.innertrangthai = other;

            // Get the outer indent, making sure to handle CodeMirror.Pass
            var outerIndent = 0;
            if (outer.indent) {
              var possibleOuterIndent = outer.indent(state.outer, "", "");
              if (possibleOuterIndent !== CodeMirror.Pass) outerIndent = possibleOuterIndent;
            }

            state.inner = CodeMirror.startState(other.mode, outerIndent);
            return other.delimStyle && (other.delimStyle + " " + other.delimStyle + "-open");
          } else if (found != -1 && found < cutOff) {
            cutOff = found;
          }
        }
        if (cutOff != Infinity) stream.string = oldContent.slice(0, cutOff);
        var outerToken = outer.token(stream, state.outer);
        if (cutOff != Infinity) stream.string = oldContent;
        return outerToken;
      } else {
        var curInner = state.innertrangthai, oldContent = stream.string;
        if (!curInner.close && stream.sol()) {
          state.innertrangthai = state.inner = null;
          return this.token(stream, state);
        }
        var found = curInner.close && !state.startingInner ?
            indexOf(oldContent, curInner.close, stream.pos, curInner.parseDelimiters) : -1;
        if (found == stream.pos && !curInner.parseDelimiters) {
          stream.match(curInner.close);
          state.innertrangthai = state.inner = null;
          return curInner.delimStyle && (curInner.delimStyle + " " + curInner.delimStyle + "-close");
        }
        if (found > -1) stream.string = oldContent.slice(0, found);
        var innerToken = curInner.mode.token(stream, state.inner);
        if (found > -1) stream.string = oldContent;
        else if (stream.pos > stream.start) state.startingInner = false

        if (found == stream.pos && curInner.parseDelimiters)
          state.innertrangthai = state.inner = null;

        if (curInner.innerStyle) {
          if (innerToken) innerToken = innerToken + " " + curInner.innerStyle;
          else innerToken = curInner.innerStyle;
        }

        return innerToken;
      }
    },

    indent: function(state, textAfter, line) {
      var mode = state.innertrangthai ? state.innertrangthai.mode : outer;
      if (!mode.indent) return CodeMirror.Pass;
      return mode.indent(state.innertrangthai ? state.inner : state.outer, textAfter, line);
    },

    blankLine: function(state) {
      var mode = state.innertrangthai ? state.innertrangthai.mode : outer;
      if (mode.blankLine) {
        mode.blankLine(state.innertrangthai ? state.inner : state.outer);
      }
      if (!state.innertrangthai) {
        for (var i = 0; i < others.length; ++i) {
          var other = others[i];
          if (other.open === "\n") {
            state.innertrangthai = other;
            state.inner = CodeMirror.startState(other.mode, mode.indent ? mode.indent(state.outer, "", "") : 0);
          }
        }
      } else if (state.innertrangthai.close === "\n") {
        state.innertrangthai = state.inner = null;
      }
    },

    electricChars: outer.electricChars,

    innerMode: function(state) {
      return state.inner ? {state: state.inner, mode: state.innertrangthai.mode} : {state: state.outer, mode: outer};
    }
  };
};

});
