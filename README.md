<h1>Froxlor api</h1>
<p>Version 20170113</p>
<p>Installation:<br>
  Copy all Files into your Froxlor directory. That was the simple installation.</p>
<p>Usage:<br>
You can call the api over GET-request on http://yourfroxlorlor.url/api.php<br>
for AUTH you must give the parameter <strong>adminlogin</strong> and <strong>adminpassword</strong> to authentificate on api with your admin or reseller account.</p>
<p>The <strong>func</strong> parameter will set, witch action you to start. Needed parameters you can see in follow lists:</p>
<p><strong>Add customer account:</strong></p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">customeradd</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>new loginname for customer</em></td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">generate new one insteat web..<em></em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">name</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td colspan="2" rowspan="3" bgcolor="#D0DCFC">it must set company or fistname and name. if not set anyone get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">firstname</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">company</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">street</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">zipcode</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">city</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">phone</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">fax</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">email</td>
      <td bgcolor="#D0DCFC">email address of customer</td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">customernumber</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">def_language</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to froxlor standard language</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">gender</td>
      <td bgcolor="#D0DCFC">0 = no / 1 = male / 2 = female</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">custom_notes</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">custom_notes_show</td>
      <td bgcolor="#D0DCFC">custom notes as longtext</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">diskspace</td>
      <td bgcolor="#D0DCFC">diskspace in MB</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>0</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">traffic</td>
      <td bgcolor="#D0DCFC">traffic in GB</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>0</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">subdomains</td>
      <td bgcolor="#D0DCFC">number of max. subdomains</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">emails</td>
      <td bgcolor="#D0DCFC">number of max. email addresses</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">email_accounts</td>
      <td bgcolor="#D0DCFC">number of max. pop3/imap boxes</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">email_forwarders</td>
      <td bgcolor="#D0DCFC">number of max. email redirects</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">email_quota</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to -1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">email_imap</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">email_pop3</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">ftps</td>
      <td bgcolor="#D0DCFC">number of max. ftp users</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">phpenabled</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">perlenabled</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">dnsenabled</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">store_defaultindex</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">createstdsubdomain</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">tickets</td>
      <td bgcolor="#D0DCFC">number of max. open tickets</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">mysqls</td>
      <td bgcolor="#D0DCFC">number of max. mysql databases</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">password</td>
      <td bgcolor="#D0DCFC">password of new user</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">generate new password</td>
    </tr>
  </tbody>
</table>
<p>The function customeradd is not adding a standart subdomain un current version.</p>
<p><strong>Delete customer account and customer files:</strong><br>
</p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">customerdelete</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>the loginname of customer</em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
  </tbody>
</table>
<p><strong>Update customer account details:</strong></p>
<p>comes in next version</p>
<p><strong>Update customer account resources:</strong></p>
comes in next version
<p><strong>Set new password for customer account and his master ftp account:</strong></p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">customernewpasswd</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>the loginname of customer</em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">password</td>
      <td bgcolor="#D0DCFC"><em>the new password</em></td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">generate new password</td>
    </tr>
  </tbody>
</table>
<p><strong>Lock or unlock customer account:</strong></p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">customerlock</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>the loginname of customer</em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">lock</td>
      <td bgcolor="#D0DCFC"><em>1 or 0<br>
      (if 1 the account locked; if 0 the account unlocked)</em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
  </tbody>
</table>
<p><strong>Add domainname to customer:</strong></p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">customerdomain</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7">action</td>
      <td bgcolor="#D7D7D7">add</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>the loginname of customer</em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">domainname</td>
      <td bgcolor="#D0DCFC"><em>the domainname<br>
(IDN's as Punycode!) </em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">ipsets</td>
      <td bgcolor="#D0DCFC">id's od ip sets (eg. 1,2,3)</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">used standart ip's and port's that configured in froxlor</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">binddomain</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">maildomain</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">mailonlydomain</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">wildcarddomain</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">subcanmail</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">canedit</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">zonefile</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC"><em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">dkim</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">dkim_privkey</td>
      <td bgcolor="#D0DCFC">dkim private key</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">dkim_pubkey</td>
      <td bgcolor="#D0DCFC">dkim public key</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">wwwalias</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">parentdomain_id</td>
      <td bgcolor="#D0DCFC">id of parent domain</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">openbasedir</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">openbasedirpath</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">speclog</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">sslredirect</td>
      <td bgcolor="#D0DCFC">1 or 0<br>
        (if 1: domain must be set as https - set letsencypt = 1)</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">specialsettings</td>
      <td bgcolor="#D0DCFC">spezial setting as longtext</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to <em>null</em></td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">bindserial</td>
      <td bgcolor="#D0DCFC">10 digit numerial serial</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">ist gernerate a new serial</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">phpsettingid</td>
      <td bgcolor="#D0DCFC">id of php settings</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 1</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">mod_fcgid_starter</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to -1 (unlimited)</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">mod_fcgid_maxrequests</td>
      <td bgcolor="#D0DCFC">&nbsp;</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to -1 (unlimited)</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">ismainbutsubto</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">letsencrypt</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">hsts</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">hsts_sub</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">hsts_preload</td>
      <td bgcolor="#D0DCFC">1 or 0</td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">is set to 0</td>
    </tr>
  </tbody>
</table>
<p>Document root of domain is set to customer web dir and can  not change on the current version with api!</p>
<p><strong>Delete domainname from customer:</strong></p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">customerdomain</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7">action</td>
      <td bgcolor="#D7D7D7">delete</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>the loginname of customer</em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">domainname</td>
      <td bgcolor="#D0DCFC"><em>the domainname<br>
        (IDN's as Punycode!)
      </em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
  </tbody>
</table>
<p><strong>List customer accounts:</strong></p>
<p>Listed all customer accounts of your admin / reseller account as array.</p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">listcustomers</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
  </tbody>
</table>
<p><strong>List customer domains:</strong></p>
<p>Listed all customer domains of your admin / reseller account as array.</p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">listdomains</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>the loginname of customer</em></td>
      <td bgcolor="#D0DCFC">no</td>
      <td bgcolor="#D0DCFC">if no customer set, listed all customer domains</td>
    </tr>
  </tbody>
</table>
<p><strong>List used ressources from customer:</strong></p>
<table width="90%">
  <tbody>
    <tr>
      <td bgcolor="#90A0FF"><strong>Variable:</strong></td>
      <td bgcolor="#90A0FF"><strong>Input:</strong></td>
      <td bgcolor="#90A0FF"><strong>Required:</strong></td>
      <td bgcolor="#90A0FF"><strong>If not set:</strong></td>
    </tr>
    <tr>
      <td bgcolor="#D7D7D7"><strong>func</strong></td>
      <td bgcolor="#D7D7D7">listcustomerressources</td>
      <td bgcolor="#D7D7D7">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
    <tr>
      <td bgcolor="#D0DCFC">username</td>
      <td bgcolor="#D0DCFC"><em>the loginname of customer</em></td>
      <td bgcolor="#D0DCFC">yes</td>
      <td bgcolor="#FDA79E">get error</td>
    </tr>
  </tbody>
</table>
