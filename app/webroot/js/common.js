String.prototype.QH_encodeURIComponent = function() {
  // URL encoding doesn't work entirely ... Apache doesn't allow encoded slashes. Let's convert them
  //   to an unlikely series of characters.
  // See http://www.jampmark.com/web-scripting/5-solutions-to-url-encoded-slashes-problem-in-apache.html
  string = this.replace(/\//g, '[|[');
  string = string.replace(/\\/g, ']|]');
  string = string.replace(/\:/g, '|*|');
  string = string.replace(/\#/g, '|^|');
  string = string.replace(/\&/g, '[][');
  string = string.replace(/\'/g, '|}|');
  string = string.replace(/\"/g, '|{|');
  string = string.replace(/\?/g, '|$|');
  string = encodeURIComponent(string);
  return string.replace(/\%0A/g, '');
};

String.prototype.QH_decodeURIComponent = function() {
  string = decodeURIComponent(this);
  string = string.replace(/\|\$\|/g, '?');
  string = string.replace(/\|\}\|/g, '\'');
  string = string.replace(/\|\{\|/g, '\"');
  string = string.replace(/\[\]\[/g, '&');
  string = string.replace(/\|\^\|/g, '#');
  string = string.replace(/\|\*\|/g, ':');
  string = string.replace(/\[\|\[/g, '/');
  return string.replace(/\]\|\]/g, '\\');
};