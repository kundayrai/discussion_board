
<h4>Comments:</h4>

<div class="comment-area">
<?php foreach ($discussion as $discussion): ?>
		<div class="comment-box">
        	<h3><?php echo $discussion['username']; ?></h3>
        	<div class="main">
            	    <?php echo $discussion['content']; ?>
        	</div>
        </div>
<?php endforeach; ?>
</div>

<br><br>

<?php $this->load->library('form_validation'); ?>

<div class="form">
<?php echo form_open('discussion/create'); ?>

    <label for="username">Name</label>
    <input type="input" name="username" /><br />

    <label for="content">Comment</label>
    <textarea name="content"></textarea><br />

    <input type="submit" name="submit" value="Submit Comment" class="button" />

</form>
</div>