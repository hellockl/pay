<?php
/**
 * 支付控制
 */
namespace Pay;
use Pay\Alipay\Alipay;
use Pay\Wxpay\Wxpay;
use Pay\Unpay\Unpay;
require_once 'Alipay/Alipay.class.php';				//支付宝支付
require_once 'Wxpay/Wxpay.class.php';				//微信支付
require_once 'Unpay/Unpay.class.php';				//银联支付
class Pay{
	const PAY_TYPE=['wxpay','alipay','unpay'];			//支付类型
	const CALL_TYPE=['1'=>'app','2'=>'h5','3'=>'native'];		//起调支付控件类型
	const SERVER_TYPE=['recharge','bay'];			//购买类型（虚拟商品支付、实物商品）
	static private  $source=[];		//支付对象实例
	private $paytype=NULL;			//当前的支付方式
	private $_instance=NULL;		//当前的支付实例
	public function __construct($payType,$options){
// 			转换成小写，统一处理
			$this->paytype=strtolower($payType);
			if(!isset(self::$source[md5($this->paytype)])){
				switch ($this->paytype){
					case 'alipay':
						self::$source[md5($this->paytype)]=new	Alipay($options);
						break;
					case 'wxpay':
						self::$source[md5($this->paytype)]=new Wxpay($options);
						break;
					case 'unpay':
						self::$source[md5($this->paytype)]=new Unpay($options);
						break;
				}
		  }
// 		  返回对象
			$this->_instance=self::$source[md5($this->paytype)];
		  	return $this->_instance;
	}
	
	
	
	
	/**
	 * 统一处理订单的详细信息
	 * @param array $orderdetail 	传入订单的详细信息
	 */
	public function get_order_detail($orderdetail){
		return call_user_func_array(array($this->_instance,'get_order_detail'), $orderdetail);
	}
	
	/**
	 * 统一处理订单的回调
	 */
	public function notify(){
		$getNotifyData=$_REQUEST;
		return call_user_func_array(array($this->_instance,'notify'), $getNotifyData);
	}

}
/* $array=array(
	'key'=>'99999999999999',
	'value'=>'5555555555555'
);
$history_arr=include_once 'Alipay/alipay.config.php';

$array=array_merge($history_arr,$array);
$var_export=var_export($array,true);

$string=<<<ero
<?php  
return $var_export;
?>
ero;

file_put_contents('Alipay/alipay.config.php',$string); */
