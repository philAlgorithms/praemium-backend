<section class="py-4" id="faq" >
    <div class="container">
    	<div class="row my-5">
      	    <div class="col-md-6 mx-auto text-center">
        	<h2>Frequently Asked Questions</h2>
        	<p>Welcome to the {{ env('APP_NAME') }} Help Center</p>
      	    </div>
    	</div>
    	<div class="row">
      	    <div class="col-md-10 mx-auto">
            	<div class="accordion" id="accordionRental">
	   	    <x-general.faq
			id="one"
			question="What are the Deposit Fees at"
			answer="For cryptocurrency deposits the fee is .variable('DEPOSIT_CHARGE').%".
	    	    />
	    	    <x-general.faq
			id="two"
			question="Why did I not receive my full deposit amount?"
			answer="<p>Sometimes the amount sent from your wallet and what we receive is different.</p><p>
This can happen due to intermediary or correspondent exchanges charging fees or even exchanging the funds en route to a different cryptocurrency. </p><p>"
	    	    />
	    	    <x-general.faq
			id="three"
			question="Can I update or remove saved wallet information?"
			answer="<p><b>To add or remove any of your saved wallet account details:</b></p>
	<ol>
	   <li>Navigate to the <b>Profile</b> page of your account</li>
	   <li>Scroll to <b>Payment options</b></li>
	   <li>Click on <b>add wallet</b> and select the associated currency to add new wallet address </li>
	    <li>To delete an address, click on the trash button beside any address to remove it from your account</li>
	    <li>Note that in order to avoid typo errors, <b>we do not allow editing of existing addresses</b></li>
	</ol>
"
		    />
		    <x-general.faq
			id="four"
			question="What percentage do I receive from referrals?"
			answer="<p>When a customer uses your referral id to sign up, you get 10% of any of their active earnings (Not including their own referral bonus)</p><p>"
	    	    />
        	</div>
      	    </div>
    	</div>
    </div>
</section>
