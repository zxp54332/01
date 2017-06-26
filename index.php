<html>
    <head>
        <title>電影院訂位</title>
    </head>
    <link href="data/style.css" rel="stylesheet" type="text/css">
    <script src="func.js"></script>
    <?
        include("data/mysql.php");
    ?>
    <body>
        <div class="top">
            <font size="+5" style="line-height:2em; position:relative; left:3%;"><strong>電影院訂位</strong></font>
        </div>
        <div class="menu">
        	<ul style="display:inline;">
            	<a href="index.php">
				<?
					if($_GET[w]=="")
					{
				?>
                		<li class="menu_item" style="background-color:rgba(153,153,153,1);">上映電影</li>
				<?
					}
					else
					{
				?>
		                <li class="menu_item">上映電影</li>	
				<?
					}
				?>
                </a>
            	<a href="?w=1">
                <?
					if($_GET[w]=="1"||$_GET[w]=="2"||$_GET[w]=="3"||$_GET[w]=="4")
					{
				?>
						<li class="menu_item" style="background-color:rgba(153,153,153,1);">線上購票</li>
				<?
					}
					else
					{
				?>
                		<li class="menu_item">線上購票</li>
				<?
					}
				?>
                </a>
            	<a href="?w=5">
                <?
					if($_GET[w]=="5"||$_GET[w]=="6")
					{
				?>
            			<li class="menu_item" style="background-color:rgba(153,153,153,1);">查看購票資訊</li>
				<?
					}
					else
					{
				?>
            			<li class="menu_item">查看購票資訊</li>
				<?
					}
				?>
                </a>
            </ul>
        </div>
        <div class="middle">
			<?
                if($_GET[w]=="")
                {
                    ?>
                    <center><h1>目前上映的電影</h1><hr width="400" color="#CCCCCC"></center>
                    <?
                    $f1=$mq("select * from movie");
                    while($ff1=$mfa($f1))
                    {
                        $tt=mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"));
                        $a11=$mnr($mq("select * from movietime where _sid=$ff1[_id] &&_time not between 0 and $tt"));
                        if($a11!=0)
                        {
                            ?>
                            <div class="movie_item">
                                <img src="img/<?=$ff1[_img]?>" title="<?=$ff1[_name]?>" width="340" height="auto" style="margin:0px 0px 20px 0px; border-radius:10px 10px 0px 0px;">
                                <div style="padding:5px 10px;">
                                	片名:<?=$ff1[_name]?><br>
                                    上映日期：<?=date("Y-m-d",$ff1[_releasetime])?><br>
                                    導演:<?=$ff1[_director]?><br>
                                </div>
                                <center><div style="margin:10px 0px;">
                                <a href="<?=$ff1[_video]?>" target="_blank"><input class="movie_button" type="button" value="觀賞預告"></a>
                                <a href="index.php?w=1&sid=<?=$ff1[_id]?>" target="_blank"><input class="movie_button" type="button" value="立刻訂票"></a>
                                </div></center>
                            </div>
                            <?
                        }
                    }
                }
				else if($_GET[w]=="1")
				{
					if($_GET[sid]!="")
					{
						$ss=$mq("select * from movie where _id=$_GET[sid]");
						?>
                    		<center>
                            	<h1>電影介紹</h1><hr width="400" color="#CCCCCC">
                            </center>
                            	<div style="float:left;" align="center">
	                            	<img src="img/<?=$mr($ss,0,"_img")?>" height="300" style="margin:20px 60px;"><br>
                                    <a href="index.php?w=2&sid=<?=$_GET[sid]?>"><input class="movie_button" type="button" value="購票" style="margin:20px 60px;"></a>
                                </div>
                                <div style="margin:20px 0px; float:left; font-size:18px; width:400px;">
                                電影名稱 : <?=$mr($ss,0,"_name")?><br><br>
                                上映日期 : <?=date("Y-m-d",$mr($ss,0,"_releasetime"))?><br><br>
                                發行商 : <?=$mr($ss,0,"_release_company")?><br><br>
                                語言 : <?=$mr($ss,0,"_language")?><br><br>
                                片長 : <?=$mr($ss,0,"_time")?><br><br>
                                導演 : <?=$mr($ss,0,"_director")?><br><br>
                                演員 : <?=$mr($ss,0,"_actor")?>
                                </div>
						<?
					}
					else
					{
						$f1=$mq("select * from movie");
						?>
						<center>
                        <h1>選擇電影</h1>
                        <select id="mov" style="width:300px; height:40px; font-size:18px; cursor:pointer;" onChange="_choosemov()">
                        <option>請選擇電影</option>
						<?
						while($ff1=$mfa($f1))
						{
							$tt=mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"));
							$a11=$mnr($mq("select * from movietime where _sid=$ff1[_id] &&_time not between 0 and $tt"));
							if($a11!=0)
							{
								?>
								<option value="<?=$ff1[_id]?>"><?=$ff1[_name]?></option>
								<?
							}
						}
						?>
						</select></center>
						<?
					}
				}
				else if($_GET[w]=="2")
				{
					$tt=mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"));
					$f1=$mq("select * from movietime where _sid=$_GET[sid] && _time not between 0 and $tt");
					?>
					<center>
					<h1>選擇場次</h1>
					<select id="mov" style="width:300px; height:40px; font-size:18px; cursor:pointer;" onChange="_chooseshow(<?=$_GET[sid]?>)">
					<option>請選擇場次</option>
					<?
					while($ff1=$mfa($f1))
					{
						?>
						<option value="<?=$ff1[_id]?>"><?=date("Y-m-d H:i:s",$ff1[_time])?></option>
						<?
					}
					?>
					</select></center>
					<?
				}
				else if($_GET[w]=="3")
				{
					for($i=1;$i<=50;$i++)
					{
						$f1=$mq("select * from book where _sid=$_GET[show]&&_seat=$i");
						$nn=$mnr($f1);
						if($nn==0)
						{
							?>
							<div id="_seat<?=$i?>" style="width:5%; height:6%; padding:3% 2.3%; float:left; border:rgba(255,255,255,1) 1px solid; color:rgba(0,0,0,1); cursor:pointer; background-color:rgba(204,204,204,1);" onClick="_chooseseat(<?=$_GET[sid]?>,<?=$_GET[show]?>,<?=$i?>)" align="center">未選</div>
							<?
						}
						else
						{
							?>
							<div style="width:5%; height:6%; padding:3% 2.3%; float:left; border:rgba(255,255,255,1) 1px solid; color:rgba(255,0,0,1); cursor:pointer;" align="center">已選</div>
							<?
						}
					}
				}
				else if($_GET[w]==4)
				{
					?>
                    <center>
					<form method="post" action="data/mysql.php?m=1&show=<?=$_GET[show]?>&seat=<?=$_GET[seat]?>" enctype="multipart/form-data">
                        <fieldset style="margin:20px 10px; font-size:18px; width:60%;">
						<legend align="left"><font size="+3">訂票聯絡人資訊<?=$i?></font></legend>
                        <table>
                        <tr>
                        <td width="150">姓名:</td>
                        <td width="360"><input type="text" class="tt" name="_name" required placeholder="姓名" /></td>
                        </tr>
                        <tr>
                        <td>手機號碼:</td>
                        <td><input type="text" class="tt" name="_phone" required placeholder="手機號碼" pattern="09[1-8][0-9]([\-|\s]?)[0-9]{3}\1[0-9]{3}" /></td>
                        </tr>
                        <tr>
                        <td>Email:</td>
                        <td><input type="text" class="tt" name="_email" required placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" /></td>
                        </tr>
                        </table>
                        </fieldset>
                        <input type="submit" value="送出" style="width:100px; height:40px; font-size:18px; border-radius:5px; box-shadow:1px 1px 3px #000000; margin:30px 0px 5px 0px;" />
                    </form>
					</center>
					<?
				}
				else if($_GET[w]=="5")
				{
					?>
                   <center>
                        <h1>購票紀錄查詢</h1>
                        <div style="margin:30px 0%;">
                            <font size="+2">請輸入訂單編號 : </font><input type="text" class="tt" id="_search" placeholder="請輸入欲查詢訂單之編號" style="width:300px; height:30px; font-size:18px; margin:0px 10px;"><input type="button" value="查詢" style="width:80px; height:35px; font-size:18px; border-radius:5px; box-shadow:rgba(0,0,0,1) 1px 1px 3px; cursor:pointer;" onClick="_sear()">
                        </div>
					</center>
					<?
				}
				else if($_GET[w]=="6")
				{
					$a7=$mq("select * from book where _number = $_GET[searchid] order by _seat ASC");
					$a71=$mr($mq("select * from book where _number = $_GET[searchid]"),0,"_sid");
					$a72=$mq("select * from movietime where _id = $a71");
					$a73=$mr($a72,0,"_sid");
					?>
					<fieldset>
					<legend><h2>訂票資訊</h2></legend>
					<table width="100%">
					<tr>
					<td rowspan="5" width="50%"><img src="img/<?=$mr($mq("select * from movie where _id = $a73"),0,"_img")?>" width="500" /></td>
					<td width="100">電影名稱:</td>
					<td><?=$mr($mq("select * from movie where _id = $a73"),0,"_name")?></td>
					</tr>
					<tr>
					<td>電影日期:</td>
					<td><?=date("Y/m/d",$mr($a72,0,"_time"))?></td>
					</tr>
					</tr>
					<tr>
					<td>電影時間:</td>
					<td><?=date("H:i",$mr($a72,0,"_time"))?></td>
					</tr>
					<tr>
					<td>座位</td>
					<td>
					<?
						while($aa7=$mfa($a7))
						{
							echo $aa7[_seat] . " ";
						}
					?>
					</td>
					</tr>
					</table>
					</fieldset>
					<?
				}
            ?>
        </div>
        <div class="bottom" align="right">
            &copy;right by Kai-Lin Zhang
        </div>
    </body>
</html>