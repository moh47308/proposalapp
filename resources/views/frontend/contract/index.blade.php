<?php $total= 0 ; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Proposal</title>
	<style>
		body{
			font-family: "Times New Roman", Times, serif;
			background-color: rgba(245, 245, 245, 1);
      font-size: 16px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-3">
		</div>
		<div class="col-6" style="background-color: rgba(255, 255, 255, 1); padding: 50px 100px;">
			<p style="text-align: center;"><strong> STANDARD  SERVICES AGREEMENT</strong></p>
			<?php $today = date("d/m/y"); ?>
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td width="70%" valign="top">
            <p>
              <strong>THIS AGREEMENT</strong> is made on
            </p>
          </td>
          <td width="30%" valign="top">
            <p align="right">
              <strong>Date: {{ $today }}</strong>
            </p>
          </td>
        </tr>
      </table>
      <p style="display: block; margin-top: -10px; margin-bottom: 20px;">
        <strong>BETWEEN</strong>
      </p>
      <ol start="1" type="1">
	      <li>
          <strong>{{ $client_detail["name"] }} [the       Buyer]</strong> of (the &quot;Buyer&quot;); and 
        </li>
        <li>
          <strong>{{ $company_detail["name"] }}    [the Service Provider]</strong> of (the &quot;Service       Provider&quot;), 
        </li>
      </ol>
      <p>Collectively referred to as the  &quot;Parties&quot;. 
        <strong>RECITALS</strong> <br>
        The Buyer wishes to be provided with the  Services (defined below) by the Service Provider and the Service Provider  agrees to provide the Services to the Buyer on the terms and conditions of this  Agreement. 
      </p>
      <ol start="1" type="1">
        <li><strong>Key Terms</strong></li>
      </ol>
      <ul>
        <ol>
          <p>1.1 <strong>Services</strong></p>
        </ol>
      </ul>
      <p style="padding-left: 70px;">
	      <?php  $i = 1 ?>
	      @foreach($proposal_details->proposal_services as $proposal_service )
		      - {{  ucfirst($proposal_service->service->service_title) }}
		      <br>
	       @endforeach
	      @foreach($proposal_details->proposal_services  as $proposal_service)
		      <?php   $total = $total + $proposal_service->price ?>
 	      @endforeach
        1.1.1 Our responsibilities are to:

      </p>
      <ul style="padding-left: 80px;">
        <p>o	Observe the Laws of ICB.
        </p>
        <p>o	Keep and maintain records of work completed and make them available to you upon request.
        </p>
        <p>o	Provide regular reports on the progress of any work being completed on your behalf.
        </p>
        <p>o	Raise any issues or concerns that may be found during the term of the engagement.
        </p>
        <p>o	Return any information owned by you within 31 working days upon termination of the engagement and once payment for work carried<p style="padding-left: 10px; margin-top: -10px;"> out by the practice has been made.</p>
        </p>
        <p>o	keep records in compliance with the Data Protection legislation (Registration reference:  <strong>ZA332665</strong> with ICO)
        </p>
      </ul>
<p style="margin-left: 65px;">1.1.2 Your responsibilities as the client are to: </p>
<ul>
  <p style="padding-left: 45px;">o	Provide the following proof of identity, current address and business details as required by anti-money laundering regulations.</p>
  <p style="padding-left: 55px;">o	A utility bill dated within the last three months</p>
  <p style="padding-left: 55px;">o	Passport or driving licence or Photo ID cards of all named directors / partners / principles.</p>
  <p style="padding-left: 55px;">o	Certificate of Incorporation (if a Ltd company)</p>
  <p style="padding-left: 45px;">o	Ensure that records of your business activities are correct and maintained to meet the requirements of regulatory authorities.</p>
  <p style="padding-left: 45px;">o	Disclose all relevant information to enable us to complete the work within agreed timescales as set in 1.2</p>
  <p style="padding-left: 45px;">o	 Allow full and free access to financial and other records held by yourselves or third parties.</p>
</ul>
<p style="margin-left: 65px;">1.2&nbsp;<strong>Delivery of  the Services</strong></p>
<ol start="1" type="1">
  <ol start="1" type="a">
    <p>a.<strong>	Start date: </strong>The        Service Provider shall commence the provision of the Services on date: <?php echo $today; ?></p>
    <p>b.<strong>	Completion date: </strong>The        Service Provider shall complete the Services until further notice.</p>
  </ol>
</ol>
<p style="margin-left: 65px; margin-bottom: -15px">1.3&nbsp;<strong>Site</strong></p><br>
  <p style="margin-left: 65px;">The Service Provider  shall provide the Services at the following site(s): [11 Viktor Hugo utca,  Budapest, 1132, Hungary]</p><br>
  <p style="margin-left: 65px;">1.4&nbsp;<strong>Price</strong></p>
<ul>
  <ol start="1" type="a">
    <p>c.	As consideration for the provision of the Services by the Service Provider, the price for the provision of the Services are listed here: <br><p style="padding-left: 10px; margin-top: -10px;">(&quot;Price&quot;). </p></p>
  </ol>
</ul>

<p style="margin-left: 80px;">As listed on the  proposal for <?php echo "&#163;".round($total/12) ; ?>/month  for the first financial year.</p>
<ul>
  <ol start="1" type="a">
    <p>d.	The Buyer shall pay  for the Service Provider&rsquo;s out-of-pocket expenses </p>
  </ol>
</ul>
<p style="margin-left: 95px;">The expense was part  of your core service:</p>
<ul>
<ul>
<ul>
  <p>o	Postage or other administrative costs;</p>
  <p>o	Bank charges, for example for transferring funds to your client.</p>
</ul>
</ul>
</ul>
<p style="margin-left: 95px;">The expense was  incurred on behalf of your client</p>
<ul>
  <p style="margin-left: 80px;">o	Software purchased  by you that will be installed at your client&rsquo;s site and become their property;</p>
</ul>
<p style="margin-left: 65px;">1.5&nbsp;<strong>Payment</strong></p>
<ol start="1" type="1">
  <ol start="5" type="a">
    <p>e. The Buyer agrees to pay the Price to the Service Provider on the following dates:</p>
  </ol>
</ol>
<p style="margin-left: 90px; line-height: 25px;">7 days payment terms for general  invoices <br>
  Alternatively, the client can  pay in installments </p>
<ol start="1" type="1">
  <ol start="6" type="a">
    <p>f. The Service Provider shall invoice the Buyer through QuickBooks for the Services that it has provided to the Buyer monthly after the <br><p style="padding-left: 15px; margin-top: -10px;">Completion Date</p></p>
  </ol>
</ol>
<ul>
  <ul>
    <p>g. The Buyer shall pay such invoices within 30 days of their receipt from the Service Provider. </p>
    <p>h. Interest may be applied to any overdue accounts at a rate of [3%]. Where payment has not been received we reserve the right to <br><p style="padding-left: 15px; margin-top: -10px;">withhold services, documents and information, and have the right to cease to work on your account, and to terminate the engagement if payments are unduly delayed.</p></p>
    <p>i. The method of payment of the Price by the Buyer to the Service Provider shall be by:</p>
  </ul>
</ul>
<ol start="1" type="1">
  <ol start="9" type="a">
    <ol start="1" type="i">
      <p>i.  Check sent to the following address:</p>
    </ol>
  </ol>
</ol>
<p style="margin-left: 130px;">71-75 Shelton Street<br>
  London <br>
  WCH2 9JQ</p>
<ol start="1" type="1">
  <ol start="9" type="a">
    <ol start="2" type="i">
      <p>ii.  Wire transfer through online banking to the following account:  </p>
    </ol>
  </ol>
</ol>
<p style="margin-left: 130px;">Spartan Accounting Group Ltd<br>
  Barclays Bank Plc.<br>
  Account number: 23587584<br>
  Short code: 20-57-76</p>
<ul>
  <ul>
    <p>j. Any charges payable under this Agreement are exclusive of any applicable taxes, tariff surcharges or other like amounts assessed by any<br><p style="padding-left: 10px; margin-top: -10px;"> governmental entity arising as a result of the provision of the Services by the Service Provider to the Buyer under this Agreement and such shall be payable by the Buyer to the Service Provider in addition to all other charges payable hereunder.  </p></p>
  </ul>
</ul>
<p style="margin-left: 65px;">1.6 <strong>Retaining and  Accessing Records</strong></p>
<ul>
  <p style="margin-left: 40px;">o  Any information produced or relating to the work we undertake for you will be returned to you and should be kept for a period of no less<br><p style="padding-left: 50px; margin-top: -10px;"> than 6 years from the end of the tax year in question. </p></p>
  <p style="margin-left: 40px;">o  You agree that any work completed and work in progress for which payment is outstanding will be held by us until all fees relating to it<br><p style="padding-left: 50px; margin-top: -10px;"> have been paid.</p></p>
  </ul>
  <p style="margin-left: 30px;"><strong>2.  General terms </strong></p>
  <p style="margin-left: 50px;">2.1&nbsp;<strong>Intellectual  Property Rights</strong><br>
  The Service Provider agrees to grant to the Buyer a non-exclusive, irrevocable, royalty free license to use copy and modify any elements of the Material not specifically created for the Buyer as part of the Services. In respect of the Material specifically created for the Buyer as part of the Services, the Service Provider assigns the full title guarantee to the Buyer and any all of the copyright, other intellectual property rights and any other data or material used or subsisting in the Material whether finished or unfinished. If any third party intellectual property rights are used in the Material the Service Provider shall ensure that it has secured all necessary consents and approvals to use such third party intellectual property rights for the Service Provider and the Buyer. For the purposes of this Clause 2.1, "Material" shall mean the materials, in whatever form, used by the Service Provider to provide the Services and the products, systems, programs or processes, in whatever form, produced by the Service Provider pursuant to this Agreement.</p><br>
  <p style="margin-left: 50px;">2.2&nbsp;<strong>Warranty</strong></p>
<ul>
  <ul>
    <p>a. The Service Provider represents and warrants that: </p>
  </ul>
</ul>
<ol start="2" type="1">
  <ol start="1" type="a">
    <ol start="1" type="i">
      <p>i. It will perform the Services with reasonable care and skill; and </p>
      <p>ii.  The Services and the Materials provided by the Service Provider to the Buyer under this Agreement will not infringe or violate<br><p style="padding-left: 18px; margin-top: -10px;"> any intellectual property rights or other right of any third party.  </p></p>
    </ol>
  </ol>
</ol>
<p style="margin-left: 50px;">2.3&nbsp;<strong>Limitation  of liability</strong></p>
<ol start="2" type="1">
  <ol start="2" type="a">
    <p>b.  Subject to the Buyer&rsquo;s obligation to pay the Price to the Service Provider, either party’s liability in contract, tort or otherwise (including<br><p style="padding-left: 18px; margin-top: -10px;"> negligence) arising directly out of or in connection with this Agreement or the performance or observance of its obligations under this Agreement and every applicable part of it shall be limited in aggregate to the Price.  </p>
    <p>c. To the extent it is        lawful to exclude the following heads of loss and subject to the Buyer&rsquo;s obligation to pay the Price, in no event shall<br><p style="padding-left: 18px; margin-top: -10px;"> either party be liable for any loss of profits, goodwill, loss of business, loss of data or any other indirect or consequential loss or damage whatsoever.</p></p> </p>
    <p>d. Nothing in this Clause 2.3 will serve to limit or exclude either Party&rsquo;s liability for death or personal injury arising from its own<br><p style="padding-left: 18px; margin-top: -10px;"> negligence. </p></p>
  </ol>
</ol>
<p style="margin-left: 50px;">2.4&nbsp;<strong>Term and  Termination</strong></p>
<ul>
  <ul>
    <p>e. This Agreement shall be effective on the date hereof and shall continue, unless terminated sooner in accordance with Clause 2.4(b), until<br><p style="padding-left: 18px; margin-top: -10px;"> the Completion Date. </p></p>
    <p>f. Either Party may terminate this Agreement upon notice in writing if: </p>
  </ul>
</ul>
<ol start="2" type="1">
  <ol start="6" type="a">
    <ol start="1" type="i">
      i. <p style="padding-left: 18px; margin-top: -23px; display: inline-block;">The other is in breach of any material obligation contained in this Agreement, which is not remedied (if the same is capable of being remedied) within 30 days of written notice from the other Party so to do; or</p>
      ii.<p style="padding-left: 18px; margin-top: -23px;">A voluntary arrangement is approved, a bankruptcy or an administration order is made or a receiver or administrative receiver is appointed over any of the other Party's assets or an undertaking or a resolution or petition to wind up the other Party is passed or presented (other than for the purposes of amalgamation or reconstruction) or any analogous procedure in the country of incorporation of either party or if any circumstances arise which entitle the Court or a creditor to appoint a receiver, administrative receiver or administrator or to present a winding-up petition or make a winding-up order in respect of the other Party.  </p>
    </ol>
    <p>g. Any termination of this Agreement (howsoever occasioned) shall not affect any accrued rights or liabilities of either Party nor shall it<br><p style="padding-left: 18px; margin-top: -10px;"> affect the coming into force or the continuance in force of any provision hereof which is expressly or by implication intended to come into or continue in force on or after such termination.  </p></p>
  </ol>
</ol>
<p style="margin-left: 50px; margin-bottom: -10px">2.5&nbsp;<strong>Relationship  of the Parties</strong></p><br>
  <p style="margin-left: 50px;">The Parties acknowledge  and agree that the Services performed by<strong> </strong>the Service Provider, its  employees, agents or sub-contractors shall be as an independent contractor and  that nothing in this Agreement shall be deemed to constitute a partnership,  joint venture, agency relationship or otherwise between the parties.<br>
  <p style="margin-left: 50px; margin-bottom: -10px">2.6&nbsp;<strong>Confidentiality</strong></p><br>
  <p style="margin-left: 50px; margin-bottom: -5px">Neither Party will use,  copy, adapt, alter or part with possession of any information of the other  which is disclosed or otherwise comes into its possession under or in relation  to this Agreement and which is of a confidential nature. This obligation will  not apply to information which the recipient can prove was in its possession at  the date it was received or obtained or which the recipient obtains from some  other person with good legal title to it or which is in or comes into the  public domain otherwise than through the default or negligence of the recipient  or which is independently developed by or for the recipient.</p><br>
  <p style="margin-left: 50px; margin-bottom: -10px">2.7&nbsp;<strong>Notices</strong></p><br>
  <p style="margin-left: 50px;">Any notice which may be  given by a Party under this Agreement shall be deemed to have been duly  delivered if delivered by hand, first class post, facsimile transmission or  electronic mail to the address of the other Party as specified in this  Agreement or any other address notified in writing to the other Party. Subject  to any applicable local law provisions to the contrary, any such communication  shall be deemed to have been made to the other Party, if delivered by:</p>
<ul>
  <ul>
    <p>i. First class post, 2 days from the date of posting;  </p>
    <p>ii.  Hand or by facsimile transmission, on the date of such delivery or transmission; and</p></p>
    <p>iii. Electronic mail, when the Party sending such communication receives confirmation of such delivery by electronic mail.</p> </p>
  </ul>
</ul>
<p style="margin-left: 50px; margin-bottom: -10px;">2.8 <strong>Legislation and compliance</strong></p><br>
 <p style="margin-left: 50px; margin-bottom: -10px;"> We are obliged by law to  undertake checks to ensure that you and your business are operating lawfully.  By agreeing to our terms of engagement you accept that we are authorized to  complete such checks as necessary.<br>
  Under Money Laundering  Regulations it is a criminal offence if we do not report suspicious  transactions or if we inform a client that a report has been made against them.</p><br>
 <p style="margin-left: 50px;">2.9 <strong>Complaints and disputes</strong></p>
<ul>
  <p style="margin-left: 30px;">o We want you to be entirely satisfied with the services provided to you. If, however, you are not, please refer to the Complaints Handling<br><p style="padding-left: 40px; margin-top: -10px;">  Procedure at Annex 1 of this letter. Any disputes arising from our engagement by you will, subject to the procedure at Annex 2, be governed by [English] law.</p></p>
</ul>
<ul>
  <p style="margin-left: 30px;">o  If a complaint cannot be resolved through our internal complaints handling procedure, under the Consumer Rights Act 2015 we are<br><p style="padding-left: 40px; margin-top: -10px;"> required to point you towards alternative dispute resolution (ADR) providers. There are many ADR providers listed on the Chartered Trading Standards Institute website.</p></p>
</ul>
<p>&nbsp;</p>
<p style="margin-left: 50px;">2.10 <strong>Continuity Arrangement</strong></p>
<p style="margin-left: 50px; margin-bottom: -10px;">In the event that we become unable to provide the services agreed through incapacity or death, a Continuity Arrangement has been made with Dragonfly Accounting. The purpose of this agreement is to look after your interests by providing continuity of services. You will be contacted in the event of such circumstances arising and you will have the option to decline to be covered by these arrangements. </p>
<p>&nbsp;</p>
<p style="margin-left: 30px;">3&nbsp;<strong>Miscellaneous</strong></p>
<ul>
  <ul>
    <p>a. The failure of either party to enforce its rights under this Agreement at any time for any period shall not be construed as a waiver of<br><p style="padding-left: 18px; margin-top: -10px;"> such rights.</p>  </p>
    <p>b. If any part, term or provision of this Agreement is held to be illegal or unenforceable neither the validity nor enforceability of the<br><p style="padding-left: 18px; margin-top: -10px;"> remainder of this Agreement shall be affected. </p></p>
    <p>c. Neither Party shall assign or transfer all or any part of its rights under this Agreement without the consent of the other Party. </p></p>
    <p>d. This Agreement may not be amended for any other reason without the prior written agreement of both Parties.  </p></p>
    <p>e. This Agreement constitutes the entire understanding between the Parties relating to the subject matter hereof unless any representation<br><p style="padding-left: 18px; margin-top: -10px;"> or warranty made about this Agreement was made fraudulently and, save as may be expressly referred to or referenced herein, supersedes all prior representations, writings, negotiations or understandings with respect hereto.  </p></p>
    <p>f. Neither Party shall be liable for failure to perform or delay in performing any obligation under this Agreement if the failure or delay is<br><p style="padding-left: 18px; margin-top: -10px;"> caused by any circumstances beyond its reasonable control, including but not limited to acts of god, war, civil commotion or industrial dispute. If such delay or failure continues for at least 7 days, the Party not affected by such delay or failure shall be entitled to terminate this Agreement by notice in writing to the other. </p></p>
    <p>g. This Clause 2.8(g) and Clauses 2.3, 2.5, 2.6, 2.7 and 2.8 of this Agreement shall survive any termination or expiration. </p></p>
    <p>h. This Agreement shall be governed by the laws of the jurisdiction in which the Buyer is located (or if the Buyer is based in more than<br><p style="padding-left: 18px; margin-top: -10px;"> one country, the country in which its headquarters are located) (the &quot;Territory&quot;) and the parties agree to submit disputes arising out of or in connection with this Agreement to the non-exclusive of the courts in the Territory. </p></p>
  </ul>
</ul>
<ul>
  <p style="margin-left: 30px;"><strong>Amendments to  existing clauses</strong></p>
</ul>
<p style="margin-left: 70px;">Clause(s) [<em>insert  amended clause reference(s) here</em>]<strong> </strong>shall be amended to read as  follows:</p>
<ul>
  <p style="margin-left: 30px;"><strong>Additional  clauses</strong></p>
</ul>
<p>AS  WITNESS the hands of the Parties hereto or their duly authorised  representatives the day and year first above written.</p>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="40%"><br>
      SIGNED by </td>
    <td width="60%"><p>)</p></td>
  </tr>
  <tr>
    <td width="40%"><p>for and on behalf of</p></td>
    <td width="60%"><p>)</p></td>
  </tr>
  <tr>
    <td width="40%"><p><strong>{{ $client_detail["name"] }} [the Buyer]</strong></p></td>
    <td width="60%"><p>)</p></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="40%"><p>SIGNED by</p></td>
    <td width="60%"><p>)</p></td>
  </tr>
  <tr>
    <td width="40%"><p>for and on behalf of</p></td>
    <td width="60%"><p>)</p></td>
  </tr>
  <tr>
    <td width="40%"><p><strong>{{ $company_detail["name"] }}[the Service Provider]</strong></p></td>
    <td width="60%"><p>) </p></td>
  </tr>
</table>
<p>ANNEX 1</p>
<p>COMPLAINTS PROCEDURE</p>
<p>1. Purpose</p>
<p>1.1 We, Spartan Accounting Group Ltd, are committed to  upholding best practice through a high quality service to all our clients. This  Annex sets out the procedure we will operate in dealing with complaints arising  from the provision of services under our letter of engagement.</p>
<p>2. Raising an Issue</p>
<p>2.1 In the first instance please contact David Zoboki, +447915590940  and david.zoboki@spartanaccounting.co.uk, to discuss any concerns you have, so  that the matter can be looked into immediately.  </p>
<p>3. Making an Informal Complaint</p>
<p>3.1 An informal complaint can be made by telephone, or by  speaking, face to face or in writing to David Zoboki, 07915590940, 17 Filler  Utca, 1024 Budapest, Hungary and david.zoboki@spartanaccounting.co.uk. If the  matter is not resolved at this stage, and you have not already issued a  complaint in writing, you should do so. Please include specific details so that  the matter can be thoroughly investigated.</p>
<p>4. Making a Formal Complaint</p>
<p>4.1 Upon receipt of your written formal complaint an  acknowledgement will be sent to you within 7 working days. The name and contact  details of the person who will be dealing with your case will be supplied to  you at this point.</p>
<p>4.2 Within 14 working days from receipt of your written  complaint you will receive in writing a summary of our understanding of your  complaint. You will be asked at this time to provide any further evidence or  information regarding the complaint and to confirm that we have understood all  your concerns.</p>
<p>4.3 Following such confirmation, we will investigate the  matter and write to you in reply within 14 working days unless it becomes  apparent to us that the investigation may not be completed within this  timescale. In these circumstances, a written explanation will be sent to you  including a progress report. .When a substantive reply is sent you, a summary  of findings will be included along with details of any further action to be  taken.</p>
<button style="width: 100%; background-color: rgba(87, 157, 93, 1); margin-top: 20px; margin-bottom: 05px; border: none; float: right; line-height: 50px; color: rgba(255, 255, 255, 1); font-weight: 500; font-size: 18px; border-radius: 5px; text-align: center;" onclick="window.print()" >Print</button>

<a href="@if($proposal_details['contract_status'] == 'Accepted') # 
          @else{{url('proposal/contract/send')}}  
          @endif" 
    style="width: 100%; background-color: rgba(87, 157, 93, 1); margin-top: 20px; margin-bottom: 20px; border: none; float: left; line-height: 50px; color: rgba(255, 255, 255, 1); font-weight: 500; outline: none; text-decoration: none; border: 0; font-size: 18px; border-radius: 5px; text-align: center;" >Send Email</a>
		</div>
		<div class="col-3">
		</div>
	</div>

</div>
</body>
</html>
