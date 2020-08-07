/*

Design a data structure that supports the following two operations:

void addWord(word)
bool search(word)

search(word) can search a literal word or a regular expression string containing only letters a-z or .. A . means it can represent any one letter.

Example:

addWord("bad")
addWord("dad")
addWord("mad")
search("pad") -> false
search("bad") -> true
search(".ad") -> true
search("b..") -> true

*/

var WordDictionary = function() {
  this.arr = [];
};


WordDictionary.prototype.addWord = function(word) {
  this.arr.push(word);
  console.log(null)
};

WordDictionary.prototype.search = function(word) {

  var isExist = false;
  var pattern = new RegExp(word);
  for(var i = 0; i < this.arr.length; i++) {
	  if(word.length == this.arr[i].length) {
		  if(pattern.test(this.arr[i])) {
			  isExist = true;
			  break;
		  } else {
			  isExist = false;
		  }
	  }
  }
  
  console.log(isExist)
};

var dict = new WordDictionary();

dict.addWord("at")
dict.addWord("and")
dict.addWord("an")
dict.addWord("add")

dict.search("a") // false
dict.search(".at") // false

dict.addWord("bat")
dict.search(".at") // true

dict.search("an.") // true
dict.search("a.d.") // false
dict.search("b.") // false
dict.search("a.d") // true
dict.search(".") // false

dict.addWord("bad")
dict.addWord("dad")
dict.addWord("mad")

dict.search("pad") // false
dict.search("bad") // true
dict.search(".ad") // true
dict.search("b..") // true

console.log(dict.arr)