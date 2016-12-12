=== WP Responsive Tables ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: http://coolwp.com/wp-responsive-tables.html
Tags: table, responsive,responsive table
Requires at least: 4.6
Tested up to: 4.7
Stable tag: 4.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Responsive tables by given css selectors.
== Description ==

Responsive tables by given css selectors.






== Installation ==
Install it as normal.


= Usage =

output tables as following:
```
<html>
 <head></head>
 <body>
  <h3>��Ʒ����</h3> 
  <table id="aaa"> 
   <thead> 
    <tr> 
     <th>����</th> 
     <th>��״</th> 
     <th>����</th> 
     <th>��ɫ</th> 
     <th>�й�</th> 
     <th>�׹�</th> 
     <th>�Գ�</th> 
     <th>ӫ��</th> 
     <th>֤��</th> 
    </tr> 
   </thead> 
   <tbody> 
    <tr> 
     <td>c128</td> 
     <td>��ĸ��</td> 
     <td>0.82</td> 
     <td>G</td> 
     <td>GD</td> 
     <td>VG</td> 
     <td>VG</td> 
     <td>Faint</td> 
     <td>ͳ����</td> 
    </tr> 
   </tbody> 
  </table> 
  <table id="sss"> 
   <thead> 
    <tr> 
     <th>����1</th> 
     <th>��״1</th> 
     <th>����1</th> 
     <th>��ɫ1</th> 
     <th>�й�2</th> 
     <th>�׹�3</th> 
     <th>�Գ�3</th> 
     <th>ӫ��3</th> 
     <th>֤��3</th> 
    </tr> 
   </thead> 
   <tbody> 
    <tr> 
     <td>c128</td> 
     <td>��ĸ��</td> 
     <td>0.82</td> 
     <td>G</td> 
     <td>GD</td> 
     <td>VG</td> 
     <td>VG</td> 
     <td>Faint</td> 
     <td>ͳ����</td> 
    </tr> 
   </tbody> 
  </table>
 </body>
</html>

```


= Add table selectors =

Type your table selectors directly in the following method:
```
    public static function get_table_selectors(){

        $r = array(
            '#tab-description  table#aaa',
            '#tab-description  table#sss',
            );

        return  apply_filters('coolwp_responsive_table_selectors', $r );
    }
```

Load your table selectors by  using the filter hook `coolwp_responsive_table_selectors`.


=  Tips = 

It works fine when `wp_is_mobile()` return `true` by default, you can use hook `coolwp_responsive_table_enabled` filter it.


== Frequently Asked Questions ==

= It does not work? =

* You should tell it selectors of your tables!
* It's working for mobile devices and tablets.
* Your table is missing some elements.

== Screenshots ==

1. mobile devices
2. tablets
3. desktop

== Changelog ==

= 1.0 =
* initial release.
== Upgrade Notice ==
null.