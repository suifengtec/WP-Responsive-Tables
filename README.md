# WP-Responsive-Tables
Responsive tables by given css selectors.

## Usage

output tables as following:
```

<html>
 <head></head>
 <body>
  <h3>产品参数</h3> 
  <table id="aaa"> 
   <thead> 
    <tr> 
     <th>货号</th> 
     <th>形状</th> 
     <th>重量</th> 
     <th>颜色</th> 
     <th>切工</th> 
     <th>抛光</th> 
     <th>对称</th> 
     <th>荧光</th> 
     <th>证书</th> 
    </tr> 
   </thead> 
   <tbody> 
    <tr> 
     <td>c128</td> 
     <td>祖母绿</td> 
     <td>0.82</td> 
     <td>G</td> 
     <td>GD</td> 
     <td>VG</td> 
     <td>VG</td> 
     <td>Faint</td> 
     <td>统包货</td> 
    </tr> 
   </tbody> 
  </table> 
  <table id="sss"> 
   <thead> 
    <tr> 
     <th>货号1</th> 
     <th>形状1</th> 
     <th>重量1</th> 
     <th>颜色1</th> 
     <th>切工2</th> 
     <th>抛光3</th> 
     <th>对称3</th> 
     <th>荧光3</th> 
     <th>证书3</th> 
    </tr> 
   </thead> 
   <tbody> 
    <tr> 
     <td>c128</td> 
     <td>祖母绿</td> 
     <td>0.82</td> 
     <td>G</td> 
     <td>GD</td> 
     <td>VG</td> 
     <td>VG</td> 
     <td>Faint</td> 
     <td>统包货</td> 
    </tr> 
   </tbody> 
  </table>
 </body>
</html>

```

## Add table selectors

Type your table selectors directly in the following method:
```

    /*
    define table selectors.
     */
    public static function get_table_selectors(){

        $r = array(
            '#tab-description  table#aaa',
            '#tab-description  table#sss',
            );

        return  apply_filters('coolwp_responsive_table_selectors', $r );
    }


```

Load your table selectors by  using the filter hook `coolwp_responsive_table_selectors`.

## Tips

It works fine when `wp_is_mobile()` return `true`.

## Screenshot

* Mobile devices:

![](https://raw.githubusercontent.com/suifengtec/WP-Responsive-Tables/master/screenshot-1.jpg)

* Tablet devices:

![](https://raw.githubusercontent.com/suifengtec/WP-Responsive-Tables/master/screenshot-2.jpg)

* Desktop:

![](https://raw.githubusercontent.com/suifengtec/WP-Responsive-Tables/master/screenshot-3.jpg)
