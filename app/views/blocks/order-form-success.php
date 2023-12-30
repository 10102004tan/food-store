<?php
function createFormOrderSuccess($orderId, $name, $address,$priceTotal,$phone)
{
$content = "
<div id='m_438807255641195426wrapper' dir='ltr' style='background-color:#f7f7f7;margin:0;padding:70px 0;width:100%'>
<font color='#888888'>
</font>
<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%'>
    <tbody>
        <tr>
            <td align='center' valign='top'>
                <div id='m_438807255641195426template_header_image'>
                </div>
                <font color='#888888'>
                </font>
                <font color='#888888'>
                </font>
                <table border='0' cellpadding='0' cellspacing='0' width='600'
                    id='m_438807255641195426template_container'
                    style='background-color:#ffffff;border:1px solid #dedede;border-radius:3px'>
                    <tbody>
                        <tr>
                            <td align='center' valign='top'>

                                <table border='0' cellpadding='0' cellspacing='0' width='100%'
                                    id='m_438807255641195426template_header'
                                    style='background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0'>
                                    <tbody>
                                        <tr>
                                            <td id='m_438807255641195426header_wrapper'
                                                style='padding:36px 48px;display:block'>
                                                <h1
                                                    style='font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff'>
                                                    Cảm ơn đã mua hàng của Food store</h1>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td align='center' valign='top'>

                                <font color='#888888'>
                                </font>
                                <font color='#888888'>
                                </font>
                                <table border='0' cellpadding='0' cellspacing='0' width='600'
                                    id='m_438807255641195426template_body'>
                                    <tbody>
                                        <tr>
                                            <td valign='top' id='m_438807255641195426body_content'
                                                style='background-color:#ffffff'>

                                                <font color='#888888'>
                                                </font>
                                                <font color='#888888'>
                                                </font>
                                                <table border='0' cellpadding='20' cellspacing='0' width='100%'>
                                                    <tbody>
                                                        <tr>
                                                            <td valign='top' style='padding:48px 48px 32px'>
                                                                <div id='m_438807255641195426body_content_inner'
                                                                    style='color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left'>

                                                                    <p style='margin:0 0 16px'>Xin chào $name,</p>
                                                                    <p style='margin:0 0 16px'>Chúng tôi đã xử
                                                                        lý xong đơn hàng của bạn.</p>


                                                                    <h2
                                                                        style='color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left'>
                                                                        [Đơn hàng #$orderId]</h2>

                                                                    <div style='margin-bottom:40px'>
                                                                        <table cellspacing='0' cellpadding='6'
                                                                            border='1'
                                                                            style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif'>
                                                                            <thead> 
                                                                            </thead>
                                                                            <tbody>
                                                                               

                                                                               

                                                                            </tbody>
                                                                            <tfoot>
                                                                                
                                                                                <tr>
                                                                                    <th scope='row' colspan='2'
                                                                                        style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'>
                                                                                        Trạng thái thanh toán </th>
                                                                                    <td
                                                                                        style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'>
                                                                                        Đã thanh toán</td>
                                                                                </tr>
                                                                               
                                                                                <tr>
                                                                                    <th scope='row' colspan='2'
                                                                                        style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'>
                                                                                        Tổng cộng:</th>
                                                                                    <td
                                                                                        style='color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left'>
                                                                                        <span>$priceTotal&nbsp;<span>₫</span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>


                                                                    <table id='m_438807255641195426addresses'
                                                                        cellspacing='0' cellpadding='0'
                                                                        border='0'
                                                                        style='width:100%;vertical-align:top;margin-bottom:40px;padding:0'>
                                                                        <tbody>
                                                                            <tr>
                                                                               
                                                                                <td valign='top' width='50%'
                                                                                    style='text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;padding:0'>
                                                                                    <h2
                                                                                        style='color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left'>
                                                                                        Địa chỉ giao hàng</h2>

                                                                                    <address
                                                                                        style='padding:12px;color:#636363;border:1px solid #e5e5e5'>
                                                                                        $name<br>$address<br>$phone</address>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <p style='margin:0 0 16px'>Cảm ơn đã mua
                                                                        hàng của chúng tôi.</p>
                                                                    <font color='#888888'>
                                                                    </font>
                                                                </div>
                                                                <font color='#888888'>
                                                                </font>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <font color='#888888'>

                                                </font>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <font color='#888888'>

                                </font>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <font color='#888888'>
                </font>
            </td>
        </tr>
       
    </tbody>
</table>
<div class='yj6qo'></div>
<div class='adL'>
</div>
</div>
";

    return $content;
}
