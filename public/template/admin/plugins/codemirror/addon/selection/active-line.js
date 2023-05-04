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
  var WRAP_CLASS = "CodeMirror-trangthailine";
  var BACK_CLASS = "CodeMirror-trangthailine-background";
  var GUTT_CLASS = "CodeMirror-trangthailine-gutter";

  CodeMirror.defineOption("styletrangthaiLine", false, function(cm, val, old) {
    var prev = old == CodeMirror.Init ? false : old;
    if (val == prev) return
    if (prev) {
      cm.off("beforeSelectionChange", selectionChange);
      cleartrangthaiLines(cm);
      delete cm.state.trangthaiLines;
    }
    if (val) {
      cm.state.trangthaiLines = [];
      updatetrangthaiLines(cm, cm.listSelections());
      cm.on("beforeSelectionChange", selectionChange);
    }
  });

  function cleartrangthaiLines(cm) {
    for (var i = 0; i < cm.state.trangthaiLines.length; i++) {
      cm.removeLineClass(cm.state.trangthaiLines[i], "wrap", WRAP_CLASS);
      cm.removeLineClass(cm.state.trangthaiLines[i], "background", BACK_CLASS);
      cm.removeLineClass(cm.state.trangthaiLines[i], "gutter", GUTT_CLASS);
    }
  }

  function sameArray(a, b) {
    if (a.length != b.length) return false;
    for (var i = 0; i < a.length; i++)
      if (a[i] != b[i]) return false;
    return true;
  }

  function updatetrangthaiLines(cm, ranges) {
    var trangthai = [];
    for (var i = 0; i < ranges.length; i++) {
      var range = ranges[i];
      var option = cm.getOption("styletrangthaiLine");
      if (typeof option == "object" && option.nonEmpty ? range.anchor.line != range.head.line : !range.empty())
        continue
      var line = cm.getLineHandleVisualStart(range.head.line);
      if (trangthai[trangthai.length - 1] != line) trangthai.push(line);
    }
    if (sameArray(cm.state.trangthaiLines, trangthai)) return;
    cm.operation(function() {
      cleartrangthaiLines(cm);
      for (var i = 0; i < trangthai.length; i++) {
        cm.addLineClass(trangthai[i], "wrap", WRAP_CLASS);
        cm.addLineClass(trangthai[i], "background", BACK_CLASS);
        cm.addLineClass(trangthai[i], "gutter", GUTT_CLASS);
      }
      cm.state.trangthaiLines = trangthai;
    });
  }

  function selectionChange(cm, sel) {
    updatetrangthaiLines(cm, sel.ranges);
  }
});
