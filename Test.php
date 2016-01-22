<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Test
{
   static private $test = array(12, 35, 45);

   function __construct()
   {
      var_dump('start');
   }

   public static function getTest()
   {
      return self::$test;
   }

   function __destruct()
   {
      var_dump('end');
   }

}