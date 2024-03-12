<?php
return [
		
		/////////////////
		// CLIENT MOBILE API

		// register
		"error_register_01" => "系統錯誤,獲取數據失敗",
		"error_register_02" => "該email已使用,請換其他email",
		"error_register_03" => "注冊失敗,請重試",
		"error_register_04" => "系統錯誤,獲取數據失敗",
		"success_register_01" => "注冊成功",

		// login
		"error_login_01" => "請填寫email及密碼",
		"error_login_02" => "您的密碼錯誤,請重試",
		"success_login_01" => "登入成功",

		// logout
		"success_logout_01" => "登出成功",

		// isLogin
		"error_islogin_01" => "請重新登錄",
		"success_islogin_01" => "您已登錄",

		// changePassword
		"error_changePassword_01" => "REQUIRE_LOGIN",
		"error_changePassword_02" => "請輸入舊密碼",
		"error_changePassword_03" => "請輸入新密碼",
		"error_changePassword_04" => "請輸入再次確認密碼",
		"error_changePassword_05" => "新舊密碼不得相同",
		"error_changePassword_06" => "新密碼與確認密碼不得相同",
		"error_changePassword_07" => "新密碼須為英數組合",
		"error_changePassword_08" => "新密碼長度8-16位",
		"error_changePassword_09" => "系統錯誤,獲取數據失敗",
		"error_changePassword_10" => "系統錯誤,獲取數據失敗",
		"error_changePassword_11" => "您的舊密碼驗證錯誤,請查明後重新輸入",
		"success_changePassword_01" => "操作成功",

		// getCatalog
		"error_getCatalog_01" => "系統錯誤,獲取數據失敗",
		"error_getCatalog_02" => "請輸入seller id",
		"success_getCatalog_01" => "操作成功",

		// getProduct
		"error_getProduct_01" => "系統錯誤,獲取數據失敗",
		"error_getProduct_02" => "請輸入seller id",
		"success_getProduct_01" => "操作成功",
		
		// getCartCount
		"error_getCartCount_01" => "系統錯誤,獲取數據失敗",
		"success_getCartCount_01" => "操作成功",

		//getProductDetail
		"error_getProductDatil_01" => "ID未填",
		"error_getProductDatil_02" => "系統錯誤,獲取數據失敗",
		"success_getProductDetail_01" => "操作成功",


		//getComment
		"error_getComment_01" => "ProductID未填",
		"error_getComment_02" => "系統錯誤,獲取數據失敗",
		"success_getComment_01" => "操作成功",
		
		// insertCart
		"error_insertCart_01" => "REQUIRE_LOGIN",
		"error_insertCart_02" => "ProductID未填",
		"error_insertCart_03" => "系統錯誤,獲取數據失敗",
		"error_insertCart_04" => "操作失敗",
		"error_insertCart_05" => "系統錯誤,獲取數據失敗",
		"error_insertCart_06" => "系統錯誤,獲取數據失敗",
		"error_insertCart_07" => "系統錯誤,更新數據失敗",
		"error_insertCart_08" => "quantity未填",
		"success_insertCart_01" => "操作成功",

		// purchaseCart
		"error_purchaseCart_01" => "REQUIRE_LOGIN",
		"error_purchaseCart_02" => "ProductID未填",
		"error_purchaseCart_03" => "系統錯誤,獲取數據失敗",
		"error_purchaseCart_04" => "操作失敗",
		"error_purchaseCart_05" => "系統錯誤,獲取數據失敗",
		"error_purchaseCart_06" => "系統錯誤,獲取數據失敗",
		"error_purchaseCart_07" => "系統錯誤,更新數據失敗",
		"error_purchaseCart_08" => "quantity未填",
		"success_purchaseCart_01" => "操作成功",

		// getCart
		"error_getCart_01" => "REQUIRE_LOGIN",
		"error_getCart_02" => "系統錯誤,獲取數據失敗",
		"success_getCart_01" => "操作成功",

		// changeCartQuantity
		"error_changeCartQuantity_01" => "REQUIRE_LOGIN",
		"error_changeCartQuantity_02" => "ID未填",
		"error_changeCartQuantity_03" => "Quantity未填",
		"error_changeCartQuantity_04" => "操作失敗",
		"success_changeCartQuantity_01" => "操作成功",
		
		// removeCart
		"error_removeCart_01" => "REQUIRE_LOGIN",
		"error_removeCart_02" => "ID未填",
		"error_removeCart_03" => "系統錯誤,獲取數據失敗",
		"error_removeCart_04" => "該筆紀錄不存在",
		"error_removeCart_05" => "該筆紀錄不合法",
		"error_removeCart_06" => "該筆紀錄不可變動",
		"error_removeCart_07" => "操作失敗",
		"success_removeCart_01" => "操作成功",

		// getOrderCatalog
		"success_getOrderCatalog_01" => "操作成功",

		// getReturnOrderCatalog
		"success_getReturnOrderCatalog_01" => "操作成功",

		// getShipping
		"success_getShipping_01" => "操作成功",

		// getPayment (已棄用)
		"success_getPayment_01" => "操作成功",

		// createOrder
		"error_createOrder_01" => "REQUIRE_LOGIN",
		"error_createOrder_02" => "系統錯誤,獲取數據失敗",
		"error_createOrder_03" => "商品未上架,目前無法購買",
		"error_createOrder_04" => "庫存不足",
		"error_createOrder_05" => "操作失敗",
		"error_createOrder_06" => "操作失敗",
		"error_createOrder_07" => "操作失敗",
		"error_createOrder_08" => "請選擇支付方式",
		"error_createOrder_09" => "請選擇物流方式",
		"error_createOrder_10" => "請填寫收件人姓名",
		"error_createOrder_11" => "請填寫收件人手機",
		"error_createOrder_12" => "請選擇城市",
		"error_createOrder_13" => "請選擇區域",
		"error_createOrder_14" => "請填寫詳細地址",
		"error_createOrder_15" => "請填寫郵遞區號",
		"error_createOrder_16" => "請勾選商品",
		"error_createOrder_17" => "請勾選商品",
		"success_createOrder_01" => "操作成功",

		// getOrder
		"error_getOrder_01" => "REQUIRE_LOGIN",
		"error_getOrder_02" => "系統錯誤,獲取數據失敗",
		"success_getOrder_01" => "操作成功",


		// getReturrnOrder
		"error_getReturnOrder_01" => "REQUIRE_LOGIN",
		"error_getReturnOrder_02" => "系統錯誤,獲取數據失敗",
		"success_getReturnOrder_01" => "操作成功",

		// getShopOrder
		"error_getShopOrder_01" => "REQUIRE_LOGIN",
		"error_getShopOrder_02" => "系統錯誤,獲取數據失敗",
		"success_getShopOrder_01" => "操作成功",

		// getReturrnOrder
		"error_getShopReturnOrder_01" => "REQUIRE_LOGIN",
		"error_getShopReturnOrder_02" => "系統錯誤,獲取數據失敗",
		"success_getShopReturnOrder_01" => "操作成功",


		// get SEO
		"success_getSeo_01" => "操作成功",

		// submitPayment
		"error_submitPayment_01" => "REQUIRE_LOGIN",
		"error_submitPayment_02" => "請輸入ID",
		"error_submitPayment_03" => "系統錯誤,獲取數據失敗",
		"error_submitPayment_04" => "系統錯誤,獲取數據失敗",
		"error_submitPayment_05" => "訂單當前狀態無法進行此操作",
		"success_submitPayment_01" => "操作成功",

		// addComment
		"error_addComment_01" => "REQUIRE_LOGIN",
		"error_addComment_02" => "請輸入ID",
		"error_addComment_03" => "請輸入標題",
		"error_addComment_04" => "請輸入評論",
		"error_addComment_05" => "請評分",
		"error_addComment_06" => "系統錯誤,獲取數據失敗",
		"error_addComment_07" => "訂單當前狀態無法進行此操作",
		"error_addComment_08" => "您已評價過",
		"success_addComment_01" => "評論成功",

		// finishOrder
		"error_finishOrder_01" => "REQUIRE_LOGIN",
		"error_finishOrder_02" => "請輸入ID",
		"error_finishOrder_03" => "系統錯誤,獲取數據失敗",
		"error_finishOrder_04" => "您不是該紀錄持有者",
		"error_finishOrder_05" => "訂單當前狀態無法進行此操作",
		"success_finishOrder_01" => "操作成功",

		// addAddress
		"error_addAddress_01" => "REQUIRE_LOGIN",
		"error_addAddress_02" => "請填寫收件人姓名",
		"error_addAddress_03" => "請填寫收件人手機",
		"error_addAddress_04" => "請填寫城市",
		"error_addAddress_05" => "請填寫區域",
		"error_addAddress_06" => "請填寫詳細地址",
		"error_addAddress_07" => "請填寫郵遞區號",
		"error_addAddress_08" => "系統錯誤,新增數據失敗",
		"success_addAddress_01" => "操作成功",

		// removeAddress
		"error_removeAddress_01" => "REQUIRE_LOGIN", 
		"error_removeAddress_02" => "請輸入ID", 
		"error_removeAddress_03" => "系統錯誤,刪除數據失敗", 
		"success_removeAddress_01" => "操作成功", 

		// getAddress
		"error_getAddress_01" => "REQUIRE_LOGIN",
		"error_getAddress_02" => "請輸入ID", 
		"success_getAddress_01" => "操作成功",

		// createReturnOrder
		"error_createReturnOrder_01" => "REQUIRE_LOGIN",
		"error_createReturnOrder_02" => "請輸入ID",
		"error_createReturnOrder_03" => "系統錯誤,獲取數據失敗",
		"error_createReturnOrder_04" => "系統錯誤,獲取數據失敗",
		"error_createReturnOrder_05" => "您不是該紀錄持有者",
		"error_createReturnOrder_06" => "訂單當前狀態無法進行此操作",
		"error_createReturnOrder_07" => "系統錯誤,新增數據失敗",
		"success_createReturnOrder_01" => "操作成功",

		// shippingReturnOrder
		"error_shippingReturnOrder_01" => "REQUIRE_LOGIN", 
		"error_shippingReturnOrder_01" => "請輸入ID", 
		"error_shippingReturnOrder_01" => "請輸入退貨物流單號", 
		"error_shippingReturnOrder_01" => "系統錯誤,獲取數據失敗", 
		"error_shippingReturnOrder_01" => "系統錯誤,獲取數據失敗", 
		"error_shippingReturnOrder_01" => "您不是該紀錄持有者", 
		"error_shippingReturnOrder_01" => "訂單當前狀態無法進行此操作", 
		"error_shippingReturnOrder_01" => "系統錯誤,更新數據失敗", 
		"success_shippingReturnOrder_01" => "操作成功", 

		// createSeller
		"error_createSeller_01" => "REQUIRE_LOGIN", 
		"error_createSeller_02" => "請輸入姓名", 
		"error_createSeller_03" => "請輸入生日", 
		"error_createSeller_04" => "請輸入身份證", 
		"error_createSeller_05" => "請勾選我同意", 
		"error_createSeller_06" => "系統錯誤,獲取數據失敗", 
		"error_createSeller_07" => "您已申請過,請耐心等候審核", 
		"error_createSeller_08" => "系統錯誤,更新數據失敗", 
		"error_createSeller_09" => "系統錯誤,更新數據失敗", 
		"error_createSeller_10" => "請輸入商店名稱", 
		"error_createSeller_11" => "系統錯誤,創建數據失敗", 
		"success_createSeller_01" => "操作成功", 

		// getShopProduct
		"error_getShopProduct_01" => "REQUIRE_LOGIN",
		"success_getShopProduct_01" => "操作成功",

		// getBuyerProduct
		"error_getBuyerProduct_01" => "REQUIRE_LOGIN",
		"error_getBuyerProduct_02" => "系統錯誤,獲取數據失敗", 
		"success_getBuyerProduct_01" => "操作成功",

		// getBuyerProductInfo
		"error_getBuyerProductInfo_01" => "REQUIRE_LOGIN",
		"error_getBuyerProductInfo_02" => "請輸入ID",
		"error_getBuyerProductInfo_03" => "系統錯誤,獲取數據失敗", 
		"success_getBuyerProductInfo_01" => "操作成功",

		// createBuyerProduct
		"error_createBuyerProduct_01" => "REQUIRE_LOGIN",
		"error_createBuyerProduct_02" => "欄位輸入不全",
		"error_createBuyerProduct_03" => "商品SKU已被使用",
		"error_createBuyerProduct_04" => "系統錯誤,新增數據失敗",
		"success_createBuyerProduct_01" => "操作成功",

		// editBuyerProduct
		"error_editBuyerProduct_01" => "REQUIRE_LOGIN",
		"error_editBuyerProduct_02" => "欄位輸入不全",
		"error_editBuyerProduct_03" => "商品SKU已被使用",
		"error_editBuyerProduct_04" => "系統錯誤,更新數據失敗", 
		"success_editBuyerProduct_01" => "操作成功",
		
		// deleteBuyerProduct
		"error_deleteBuyerProduct_01" => "REQUIRE_LOGIN",
		"error_deleteBuyerProduct_02" => "系統錯誤,更新數據失敗",
		"success_deleteBuyerProduct_01" => "操作成功",

		// getBuyerProductPicture
		"error_getBuyerProductPicture_01" => "REQUIRE_LOGIN",
		"error_getBuyerProductPicture_02" => "請輸入ID",
		"error_getBuyerProductPicture_03" => "系統錯誤,獲取數據失敗", 
		"error_getBuyerProductPicture_01" => "操作成功",

		// deleteBuyerProductPicture
		"error_deleteBuyerProductPicture_01" => "REQUIRE_LOGIN",
		"error_deleteBuyerProductPicture_02" => "請輸入ID",
		"error_deleteBuyerProductPicture_03" => "系統錯誤,更新數據失敗", 
		"success_deleteBuyerProductPicture_01" => "操作成功",

		// editBuyerProductPicture
		"error_editBuyerProductPicture_01" => "REQUIRE_LOGIN",
		"error_editBuyerProductPicture_02" => "請輸入ID",
		"error_editBuyerProductPicture_03" => "請輸入規格",
		"error_editBuyerProductPicture_04" => "請輸入排序",
		"error_editBuyerProductPicture_05" => "系統錯誤,更新數據失敗", 
		"success_editBuyerProductPicture_01" => "操作成功", 

		// addBuyerProductPicture
		"error_addBuyerProductPicture_01" => "REQUIRE_LOGIN",
		"error_addBuyerProductPicture_02" => "請輸入PRODUCT ID",
		"error_addBuyerProductPicture_03" => "請輸入PICTURE",
		"error_addBuyerProductPicture_04" => "系統錯誤,更新數據失敗",
		"success_addBuyerProductPicture_01" => "操作成功",

		// getBuyerShopDatail
		"error_getBuyerShopDatail_01" => "系統錯誤,獲取數據失敗",
		"error_getBuyerShopDatail_02" => "系統錯誤,獲取數據失敗",
		"error_getBuyerShopDatail_03" => "系統錯誤,獲取數據失敗",
		"success_getBuyerShopDatail_01" => "操作成功",

		///////////////////////////
		// PC端 ajax

		// add cart
		"error_ajax_add_cart_01" => "系統錯誤,獲取數據失敗",
		"error_ajax_add_cart_02" => "系統錯誤,插入數據失敗",
		"error_ajax_add_cart_03" => "系統錯誤,插入數據失敗",
		"error_ajax_add_cart_04" => "系統錯誤,插入數據失敗",
		"error_ajax_add_cart_05" => "請選擇規格",
		"success_ajax_add_cart_01" => "加入購物車成功",

		// remove cart
		"error_ajax_remove_cart_01" => "系統錯誤,獲取商品數據失敗",
		"error_ajax_remove_cart_02" => "您不是該紀錄持有者",
		"error_ajax_remove_cart_03" => "該商品已移除",
		"error_ajax_remove_cart_04" => "系統錯誤,移除商品失敗",
		"success_ajax_remove_cart_01" => "移除商品成功",

		
		// remove cart
		"error_remove_cart_01" => "REQUIRE_LOGIN",
		"error_remove_cart_02" => "參數錯誤 (ID_ISNULL)",
		"error_remove_cart_03" => "系統錯誤,獲取商品數據失敗",
		"error_remove_cart_04" => "系統錯誤,獲取商品數據失敗",
		"error_remove_cart_05" => "該商品為您持有，無法購買",
		"error_remove_cart_06" => "該商品目前狀態無法購買",
		"error_remove_cart_07" => "系統錯誤,移除數據失敗",
		"success_remove_cart_01" => "移除商品成功",

		// change qty cart
		"error_ajax_change_cart_qty_01" => "更新失敗",
		"success_ajax_change_cart_qty_01" => "變更成功",

		// add address
		"error_ajax_addAddress_01" => "請輸入收件人姓名",
		"error_ajax_addAddress_02" => "請輸入收件人手機",
		"error_ajax_addAddress_03" => "請選擇城市",
		"error_ajax_addAddress_04" => "請選擇區域",
		"error_ajax_addAddress_05" => "請填寫地址",
		"error_ajax_addAddress_06" => "請填寫郵遞區號",
		"success_ajax_addAddress_01" => "常用地址已儲存",

		//remove address
		"error_ajax_removeAddress_01" => "參數錯誤 (ID_ISNULL)",
		"error_ajax_removeAddress_02" => "系統錯誤,獲取數據失敗",
		"error_ajax_removeAddress_03" => "您不是該紀錄持有者",
		"error_ajax_removeAddress_03" => "系統錯誤,移除數據失敗",
		"success_ajax_removeAddress_01" => "移除常用地址,操作成功",

		// create_order
		"error_ajax_create_order_01" => "請選擇支付方式",
		"error_ajax_create_order_02" => "請選擇物流方式",
		"error_ajax_create_order_03" => "請輸入收件人姓名",
		"error_ajax_create_order_04" => "請輸入收件人手機",
		"error_ajax_create_order_05" => "請選擇城市",
		"error_ajax_create_order_06" => "請選擇區域",
		"error_ajax_create_order_07" => "請填寫地址",
		"error_ajax_create_order_08" => "請填寫郵遞區號",
		"error_ajax_create_order_09" => "系統錯誤,獲取數據失敗",
		"error_ajax_create_order_10" => "系統錯誤,獲取數據失敗",
		"error_ajax_create_order_11" => "商品庫存不足,請修改購買數量或移除商品後重試, 若您有任何疑問,請聯繫店家或客服人員",
		"error_ajax_create_order_12" => "系統錯誤,更新數據失敗",
		"error_ajax_create_order_13" => "系統錯誤,新增數據失敗",
		"error_ajax_create_order_14" => "系統錯誤,移除數據失敗",
		"success_ajax_create_order_01" => "新增訂單成功",

		// get product
		"error_ajax_getProduct_01" => "系統錯誤,獲取數據失敗",
		"success_ajax_getProduct_01" => "獲取成功",

		// addComment
		"error_ajax_addComment_01" => "參數錯誤 (ID_ISNULL)",
		"error_ajax_addComment_02" => "系統錯誤,獲取數據失敗",
		"error_ajax_addComment_03" => "系統錯誤,獲取數據失敗",
		"error_ajax_addComment_04" => "您已評論過此訂單",
		"error_ajax_addComment_05" => "系統錯誤,新增數據失敗",
		"error_ajax_addComment_06" => "系統錯誤,更新數據失敗",
		"success_ajax_addComment_01" => "評論成功",


		
		// getSellerOrder
		"error_getSellerOrder_01" => "REQUIRE_LOGIN",
		"error_getSellerOrder_02" => "系統錯誤,獲取數據失敗",
		"success_getSellerOrder_01" => "操作成功",

		// setSellerOrderShipping
		"error_setSellerOrderShipping_01" => "REQUIRE_LOGIN",
		"error_setSellerOrderShipping_02" => "請輸入物流單",
		"error_setSellerOrderShipping_03" => "請輸入訂單",
		"error_setSellerOrderShipping_04" => "系統錯誤,獲取數據失敗",
		"error_setSellerOrderShipping_05" => "訂單當前狀態無法進行此操作",
		"success_setSellerOrderShipping_01" => "操作成功",

		// setSellerOrderCancel
		"error_setSellerOrderCancel_01" => "REQUIRE_LOGIN",
		"error_setSellerOrderCancel_02" => "請輸入物流單",
		"error_setSellerOrderCancel_03" => "請輸入訂單",
		"error_setSellerOrderCancel_04" => "系統錯誤,獲取數據失敗",
		"error_setSellerOrderCancel_05" => "訂單當前狀態無法進行此操作",
		"success_setSellerOrderCancel_01" => "操作成功",

		// getSellerReturrnOrder
		"error_getSellerReturnOrder_01" => "REQUIRE_LOGIN",
		"error_getSellerReturnOrder_02" => "系統錯誤,獲取數據失敗",
		"success_getSellerReturnOrder_01" => "操作成功",

		// setReturnOrderConfirm
		"error_setReturnOrderConfirm_01" => "REQUIRE_LOGIN",
		"error_setReturnOrderConfirm_02" => "請輸入訂單",
		"error_setReturnOrderConfirm_03" => "系統錯誤,獲取數據失敗",
		"error_setReturnOrderConfirm_04" => "訂單當前狀態無法進行此操作",
		"error_setReturnOrderConfirm_05" => "系統錯誤,更新數據失敗",
		"success_setReturnOrderConfirm_01" => "操作成功",
		
		// setReturnOrderCancel
		"error_setReturnOrderCancel_01" => "REQUIRE_LOGIN",
		"error_setReturnOrderCancel_02" => "請輸入訂單",
		"error_setReturnOrderCancel_03" => "系統錯誤,獲取數據失敗",
		"error_setReturnOrderCancel_04" => "訂單當前狀態無法進行此操作",
		"error_setReturnOrderCancel_05" => "系統錯誤,更新數據失敗",
		"success_setReturnOrderCancel_01" => "操作成功",

		// setReturnOrderSuccess
		"error_setReturnOrderSuccess_01" => "REQUIRE_LOGIN",
		"error_setReturnOrderSuccess_02" => "請輸入訂單",
		"error_setReturnOrderSuccess_03" => "系統錯誤,獲取數據失敗",
		"error_setReturnOrderSuccess_04" => "訂單當前狀態無法進行此操作",
		"error_setReturnOrderSuccess_05" => "系統錯誤,更新數據失敗",
		"success_setReturnOrderSuccess_01" => "操作成功",

		// editBuyerShopDetail
		"error_editBuyerShopDetail_01" => "REQUIRE_LOGIN",
		"error_editBuyerShopDetail_02" => "請上傳logo",
		"error_editBuyerShopDetail_03" => "請輸入店舖名稱",
		"error_editBuyerShopDetail_04" => "系統錯誤,更新數據失敗",
		"error_editBuyerShopDetail_05" => "請輸入輪播設定",
		"error_editBuyerShopDetail_06" => "請輸入活動設定",
		"success_editBuyerShopDetail_01" => "操作成功",

		// getShippingSetting
		"error_getShippingSetting_01" => "REQUIRE_LOGIN",
		"error_getShippingSetting_02" => "系統錯誤,獲取數據失敗",
		"error_getShippingSetting_03" => "系統錯誤,獲取數據失敗",
		"success_getShippingSetting_01" => "操作成功",

		// editShippingSetting
		"error_editShippingSetting_01" => "REQUIRE_LOGIN", 
		"error_editShippingSetting_02" => "系統錯誤,更新數據失敗", 
		"success_editShippingSetting_01" => "操作成功", 
		
		// getPaymentSetting
		"error_getPaymentSetting_01" => "REQUIRE_LOGIN",
		"error_getPaymentSetting_02" => "系統錯誤,獲取數據失敗",
		"error_getPaymentSetting_03" => "系統錯誤,獲取數據失敗",
		"success_getPaymentSetting_01" => "操作成功",

		// editPaymentSetting
		"error_editPaymentSetting_01" => "REQUIRE_LOGIN", 
		"error_editPaymentSetting_02" => "系統錯誤,更新數據失敗", 
		"success_editPaymentSetting_01" => "操作成功", 

		// getStoreTag
		"error_getStoreTag_01" => "REQUIRE_LOGIN", 
		"error_getStoreTag_02" => "系統錯誤,獲取數據失敗", 
		"success_getStoreTag_01" => "操作成功", 

		// editStoreTag
		"error_editStoreTag_01" => "REQUIRE_LOGIN", 
		"error_editStoreTag_02" => "請輸入ID", 
		"error_editStoreTag_03" => "請輸入賣場標籤", 
		"error_editStoreTag_04" => "請輸入排序", 
		"error_editStoreTag_05" => "請輸入狀態", 
		"error_editStoreTag_06" => "系統錯誤,更新數據失敗", 
		"success_editStoreTag_01" => "操作成功", 

		// createStoreTag
		"error_createStoreTag_01" => "REQUIRE_LOGIN", 
		"error_createStoreTag_02" => "請輸入賣場標籤", 
		"error_createStoreTag_03" => "請輸入排序", 
		"error_createStoreTag_04" => "請輸入狀態", 
		"error_createStoreTag_05" => "系統錯誤,新增數據失敗", 
		"success_createStoreTag_01" => "操作成功", 

		// deleteStoreTag
		"error_deleteStoreTag_01" => "REQUIRE_LOGIN", 
		"error_deleteStoreTag_02" => "請輸入ID", 
		"error_deleteStoreTag_03" => "系統錯誤,刪除數據失敗", 
		"success_deleteStoreTag_01" => "操作成功", 

];