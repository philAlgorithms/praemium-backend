<x-cards.stat
		    text='Total Deposits'
		    :amount='dollar(client()->total_deposits)'
		    increment=''
		    icon='ni ni-money-coins'
		/>
		<x-cards.stat
		    text='Withdrawable amount'
		    :amount='dollar(client()->withdrawable_amount)'
		    increment=''
		    icon='fas fa-credit-card'
		/>

		<x-cards.stat
		    text='Total Plan Earnings'
		    :amount='dollar(client()->total_plan_earnings)'
		    increment=""
		    icon='fas fa-money-bill-alt'
		/>

		<x-cards.stat
		    text='Referal bonus'
		    :amount='dollar(client()->referral_earnings)'
		    increment=''
		    icon='fas fa-hand-holding-usd'	
		/>