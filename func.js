function _choosemov()
{
	var _id=document.getElementById('mov').value
	location.replace('index.php?w=1&sid='+_id)
}
function _chooseshow(_id)
{
	var _time=document.getElementById('mov').value
	location.replace('index.php?w=3&sid='+_id+'&show='+_time)
}
function _chooseseat(_id,_show,_seat)
{
	location.replace('index.php?w=4&sid='+_id+'&show='+_show+'&seat='+_seat)
}
function _sear()
{
	var ss=document.getElementById('_search').value
	location.replace('index.php?w=6&searchid='+ss)
}