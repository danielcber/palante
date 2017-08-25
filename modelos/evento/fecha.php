<p> 
<strong>FECHA Y HORA</strong><br>
	<?php if ($evento->start_date == $evento->end_date): ?>
		<?php
		namespace \Carbon;

			class Carbon extends \DateTime
			{
				setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
				Carbon::setLocale('es');
				$formatsd = $evento->start_date;
				$carbonsd = Carbon::parse($formatsd)->formatLocalized('%A, %d %B, %Y');
				echo ucfirst($carbonsd);
			}
		?> <br>
	    <?php 
		$formatst = $evento->start_time;
		echo Carbon::parse($formatst)->format('g:i A'); ?> -  
		<?php 
		$formatet = $evento->end_time;
		echo Carbon::parse($formatet)->format('g:i A'); ?>
	<?php endif ?>
	<?php if ($evento->start_date != $evento->end_date): ?>
		<?php 
		setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
		// Carbon::setLocale('es');
		$formatsd = $evento->start_date;
		$carbonsd = Carbon::parse($formatsd)->formatLocalized('%A, %d %B, %Y');
		echo ucfirst($carbonsd); ?>
		<?php $formatst = $evento->start_time;
		echo Carbon::parse($formatst)->format('g:i A'); ?>
	     -  
	    <?php 
		setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
		// Carbon::setLocale('es');
		$formated = $evento->end_date;
		$carboned = Carbon::parse($formated)->formatLocalized('%A, %d %B, %Y');
		echo ucfirst($carboned); ?>
		<?php 
		$formatet = $evento->end_time;
		echo Carbon::parse($formatet)->format('g:i A'); ?>
	<?php endif ?>
</p>