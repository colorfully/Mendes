<?php
class func
{
    public function getMsg($content){
        $arr=['Aries'=>'白羊座',
            'Taurus'=>'金牛座',
            'Gemini'=>'双子座',
            'Cancer'=>'巨蟹座',
            'leo'=>'狮子座',
            'Virgo'=>'处女座',
            'Libra'=>'天秤座',
            'Scorpio'=>'天蝎座',
            'Sagittarius'=>'射手座',
            'Capricorn'=>'魔羯座',
            'Aquarius'=>'水瓶座',
            'Pisces'=>'双鱼座'
            ];
        $a=array_flip($arr);
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://astro.sina.com.cn/fate_day_".$a[$content]."/");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output=curl_exec($ch);
        $rule='/<div class=\"words\">(.*?)*<\/div>/s';
        preg_match_all($rule,$output,$result);
        curl_close($ch);
        $rule2='/<p>(.*?)*<\/p>/u';
        preg_match_all($rule2,implode($result[0]),$res);
        print_r($res);
        return($res[0]);
    }
}
?>