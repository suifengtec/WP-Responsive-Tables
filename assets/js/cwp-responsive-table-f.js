/*
* @Author: suifengtec
* @Date:   2016-12-12 15:02:12
* @Last Modified by:   suifengtec
* @Last Modified time: 2016-12-12 17:37:49
*/
;jQuery(function($) {
	/*
	N个表格
	 */
	var responsiveTables = CWP_RESPONSIVE_TABLE_Data.slctrs;
	var i,j,k;
	var thisThs ;
	var thisTrs ;
	var thisTds ;
	var txts;
	for (i=0;i<= responsiveTables.length;i++){

		thisThs  = $(responsiveTables[i] + ' th');
		thisTrs  = $(responsiveTables[i] + '  tbody tr');
		/*如果没有表头,就继续下一个吧*/
		if(!thisThs.length){continue;}
		/*
		为每一个有效的表格将表头置空。
		 */
		txts = [];
		/*
		循环th,获取它们的text
		 */
		$.each( thisThs, function(j,v){
			if($(this).text()){ txts.push($(this).text());}
		});

		/*
		如果tbody 中存在tr
		 */
		if(thisTrs.length){
			/*循环tbody中的行*/
			$.each( thisTrs, function(p,v){
				/*当前行的td*/
				thisTds = $(this).find('td');
				/*循环td,并赋值*/
				$.each( thisTds, function(k,v){
					$(this).attr('data-th',txts[k]);
				});
				
			});
		}

	}

});