<?php
	$Money=$_GET['Money'];
	$api_url="http://tmwallet.thaighost.net/apipp.php";
	$tmweasy_user="peerapon";
	$tmweasy_password="Tor041316822";

	$con_id="102806"; //conid ที่ได้จากการเปิดใช้งาน Qr Promptpay Api บนเว็บ  tmweasy
	$bbl_accode="tmpwoktXABBQMDi[pl]FTaDTwuvkLUKXbdb7Aaq[sa]nL36GRNbNP4QnccSvLSRAibn27k2fxljk7KYpUkrKQy40ZQU3fVyfBw[tr][tr]";//accode จากการเข้ารหัส id และ รหัสผ่านธนาคาร ที่  https://www.tmweasy.com/encode.php 
	$bbl_account_no="0722373715";//เลขบัญชีธนาคารกรุงเทพ หรือ กสิกร  ใส่เฉพาะตัวเลข
	$prommpay_no="004999132571729";	//เลข ID พร้อมเพย์ ใส่เฉพาะตัวเลขเช่น เบอร์โทร เลขบัตร ปชช *กรณีเชื่อมกับกสิกร สามารถนำเลข e-wallet บนแอปกสิกรมาใส่ได้เลย แล้วกำหนด $prommpay_type เป็น 03   วิธีดูเลข E-Wallet บนแอปกสิกร  https://iot.thaighost.net/e_kbank.php
	$prommpay_type="03";//ประเพทพร้อมเพย์  01 = Mobile No., 02 = ID No./Tax No., 03 = E-Wallet No.
	$prommpay_name="พีรพล ภูมิพัฒนโยธา";//ชื่อบัญชี

	$mony_type=1;//0=input , 1 = Select

	$mony_list=array($Money);//list ราคาที่ให้เลือกเติมกรณีเลือก $mony_type เป็น 1

	
	$mul_credit=1;//ตัวคูณเครดิตร กับยอดเงินที่โอนมา

	//--------------- การเชื่อม ฐานข้อมูล เพื่ออัพเดทเครดิตรให้ลูกค้า----------------
	$database_host="";
	$database_user="";
	$database_password="";
	$database_db_name="";
	$database_type="0";//1 = mysql , 2 = mysqli ,3 = mssql (microsoft sql server) , 4 = Odbc for microsoft sql server , 5 = sqlsrv for microsoft sql server

	$database_table="";//ตารางที่เต็มข้อมูลลูกค้า หรือ เก็บข้อมูลเครดิตร
	$database_user_field="";//ฟิวที่ใช้ในการอ้างอิง user เช่น username userid
	$database_point_field="";//ฟิวที่ใช้ในการเก็บค่า พ้อย เครดิตร ที่ต้องการให้อัพเดทหลังเต็มเสร็จ

?>