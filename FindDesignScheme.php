<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class T
{
     
   /**
    * 根据配置选项获取设计方案的列表
    * 
    * @param integer $uid 
    * @param boolean $total
    * @param string $orderBy
    * @param integer $offset
    * @param integer $limit
    * @return array
    */
   public function getDSListByUid($uid,$total, $orderBy = null, $offset = 0, $limit = 15)
   {
      $items = DSModel::find(array(
         'uid=?0',
         'bind'=>array(0=>$uid),
         'order' => $orderBy,
         'limit' => array(
            'number' => $limit,
            'offset' => $offset
         )
      ));
      
      if($total){
         return array($items, (int)  DSModel::count(array(
         'uid=?0',
         'bind'=>array(0=>$uid))));
      }
      
      return $items;
   }
}