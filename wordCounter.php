<?php
/**
 * Desc �����ļ��ﵥ�ʳ��ֵĸ���
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
	 //��ȡ���ʸ���
	 public function count($order = self::ASC) {
		 //Ĭ������ʽ����
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
 //���÷���
 $wordCount = new WordCounter('file.txt');
 $count = $wordCount->count(WordCounter::DESC);
 //��ȡ������¸�ʽ��
 /*
 you=4	
 can=2	
 do=2	
 */
 