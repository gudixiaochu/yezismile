<?php
/**
 * Desc 计算文件里单词出现的个数
 * @author: lei.hongye
 * @version: 2017-3-21
 */
 class WordCounter{
	 const DESC = 1;
	 const ASC = 2;
	 private $words;
	 
	 public function __construct($filename) {
		 $fileContents = file_get_contents($filename);
		 $this->words = array_count_values(str_word_count(strtolower($fileContents),1));
	 }
	 //获取单词个数
	 public function count($order = self::ASC) {
		 //默认排序方式倒序
		 if ($order == self::DESC) {
			 arsort($this->words);
		 }else{
			 asort($this->words);
		 }
		 foreach($this->words as $k=>$v) {
			 echo $k."=".$v."\t\n";
		 }
	 }
	 
	 
 }
 //调用方法
 $wordCount = new WordCounter('file.txt');
 $count = $wordCount->count(WordCounter::DESC);
 //获取结果如下格式：
 /*
 you=4	
 can=2	
 do=2	
 */
 