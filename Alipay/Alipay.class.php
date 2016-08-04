<?php
namespace Pay\Alipay;
use Pay\PayBase;
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'PayBase.class.php';
class Alipay implements PayBase{
	const AI_APP_KEY='';  			//app的key
	const AI_APP_SCRIPT='';			//app的script
	const AI_H5_KEY='';				//h5起调的key
	const AI_H5_SCRIPT='';			//h5的script
	const AI_NATIVE_KEY='';			//扫码的key
	const AI_NATIVE_SCRIPT='';		//扫码的script
	protected $orderdetail=[];		//订单的详细信息
	/**
	 * (non-PHPdoc)
	 * @see \Pay\PayBase::get_order_detail()
	 * $data array 订单信息
	 * $paytype str  	支付类型
	 * $calltype str  	起调类型
	 * $servicetype  str    购买类型（'recharge'虚拟物品,'bay'真实物品）
	 */
	public function get_order_detail($data, $payType, $callType, $serviceType){
		echo " alipay   orderdetail";
		
	}
	
	/**
	 * 异步通知回调函数
	 * (non-PHPdoc)
	 * @see PayBase::notify()
	 */
	public function notify(){
		echo "this is alipay notify";
		
	}
	
	/**
	 * 起调支付页面
	 * (non-PHPdoc) 
	 * @see PayBase::initiate()
	 * $paytype str  	支付类型
	 * $calltype str  	起调类型
	 *  $servicetype  str    购买类型（'recharge'虚拟物品,'bay'真实物品）
	 *  $orderinfo   str  	订单详情
	 */
	public function initiate($payType, $callType, $serviceType,$orderinfo){
		echo 'pay 起调页面';
	}
	
}
