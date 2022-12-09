<x-cards.stat
		    text='Total Deposits'
		    :amount='dollar(client()->total_deposits)'
		    increment='20%'
		    icon='ni ni-money-coins'
		/>
		<x-cards.stat
		    text='Withdrawable amount'
		    :amount='dollar(200)'
		    increment='20'
		    icon='fas fa-credit-card'
		/>

		<x-cards.stat
		    text='Active Plan Earnings'
		    :amount='dollar(700)'
		    increment="700"
		    icon='fas fa-money-bill-alt'
		/>

		<x-cards.stat
		    text='Referal bonus'
		    :amount='dollar(900)'
		    increment='13'
		    icon='fas fa-hand-holding-usd'	
		/>