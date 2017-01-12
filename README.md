# froxlor_api
API to add, update and delete resellers, customers and domains

Fuctions in Version 08/01/2017:<br>

<p>You can call the api.php via POST-Requst an following Variables:</p>

<b>Add new Customer:</b><br/>
	[apikey]	=	in api.php set apikey<br/>
	[func]		=	customeradd<br/>
	[username]	=	loginname of the customer<br/>

<b>Change password of customer account:</b><br/>
	[apikey]	=	in api.php set apikey<br/>
	[func]		=	customernewpasswd<br/>
	[username]	=	loginname of the customer<br/>

<b>Delete customer account:</b><br/>
	[apikey]	=	in api.php set apikey<br/>
	[func]		=	customerlock<br/>
	[username]	=	loginname of the customer<br/>

<b>Lock / unlock customer account:</b><br/>
	[apikey]	=	in api.php set apikey<br/>
	[func]		=	customerlock<br/>
	[username]	=	loginname of the customer<br/>
	[lock]		=	1 or 0; 1 = lock, 0 = unlock<br/>

<b>Add / Delete Domain from customer:</b><br/>
	[apikey]	=	in api.php set apikey<br/>
	[func]		=	customerdomain<br/>
	[username]	=	loginname of the customer<br/>
	[domainname]	=	domainname as punycode<br/>
	[editable]	=	1 or 0<br/>
	[maildomain]	=	1 or 0<br/>
  [ips]		=	give id's of ip sets (eg. 1,2,3,4...) // <- in future versions of the api<br/>
	[action]	=	add or delete<br/>
