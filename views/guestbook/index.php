<div>
	<?php if(isset($_SESSION['is_logged_in'])):  ?>
	<a class="btn btn-success btn-guestbook" href="<?php echo ROOT_PATH ?>guestbook/add">Добавить запись</a>
	<?php endif; ?>
	<?php $page = array_pop($viewmodel);?>
	<?php $count = array_pop($viewmodel); ?>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<strong><small><?= $item['name']?></small></strong>
			<br/>
			<small><?= $item['create_date']?></small>		
			<br/>
			<big><?= $item['text']?></big>
		</div>
	<?php endforeach ?>
	
	<nav aria-label="Page navigation">
	  <ul class="pagination">
		<?php if($page!=1): ?>
		<li>
		  <a  href="<?= "/guestbook/index/".($page-1); ?>" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
		<?php endif ?>
		<?php for ($i = 1; $i <= ceil($count/RECORD_PER_PAGE); $i++) : ?>
			<li <?php if($i==$page){echo "class='active'";} ?>><a href="<?= "/guestbook/index/".$i; ?>"><?= $i?></a></li>
		<?php endfor ?>
		<?php if($count/$page>RECORD_PER_PAGE): ?>
		<li>
		  <a href="<?= "/guestbook/index/".($page+1); ?>" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>
		<?php endif ?>
	  </ul>
	</nav>	
</div>