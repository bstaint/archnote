<?php  if ( ! defined('BASEPATH')) exit('No Access');
if ( ! function_exists('date_to_array')){
    function date_to_array($years,$month =  null){
        if(is_numeric($years) && is_numeric($month)){
            if(($years > 1000) && ($years < 9999) && ($month > 0) && ($month < 13)){
                $date = new DateTime();
                $date->setDate($years,$month,1);
                $timestamp['begin'] = $date->format('U');
                $years = ($month == 12) ? ($years + 1) : $years;
                $month = ($month == 12) ? 1 : ($month + 1);
                $date->setDate($years,$month,1);
                $timestamp['end'] = $date->format('U');
            }else{
                $timestamp = null;
            }
        }else if(is_numeric($years) && is_null($month)){
            if(($years > 1000) && ($years < 9999)){
                $date = new DateTime();
                $date->setDate($years,1,1);
                $timestamp['begin'] = $date->format('U');
                $date->setDate($years + 1,1,1);
                $timestamp['end'] = $date->format('U');
            }else{
                $timestamp =  null;
            }
        }else{
            $timestamp = null;
        }
        return $timestamp;
    }
}

if ( ! function_exists('timestamp_to_date')){
    function timestamp_to_date($time_format,$timestamp){
        $date = new DateTime();
        $date->setTimestamp($timestamp);
        return $date->format($time_format);
    }
}

if ( ! function_exists('breakLog')){
    function breakLog($content, $cid) {
        $a = explode('<!--more-->', $content, 2);
        if (!empty($a[1])) {
            $a[0].='<p class="more"><a href="' . base_url() . 'archives/' . $cid .  '/">阅读全文&gt;&gt;</a></p>';
        }
        return $a[0];
    }
}