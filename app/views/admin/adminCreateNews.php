<?php $this->layout('admin/adminMaster',['title'=>$title]);
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
  }
?>
<section style="padding: 3rem;border-radius: 1rem;width: 100%;height: 100%;display:flex;flex-direction: column;">
    <?php if (isset($error_message)) : ?>
        <p style="color: red; text-align: center;"><?php echo $error_message?></p>
    <?php endif; ?>
    <form action="/admin/createNews" method="POST" enctype="multipart/form-data">
        <H1>Create News</H1>
        <p>Fill in the first 3 fields obligatorily</p>
        <input style="margin-bottom: 1rem;" type="file" name="image" accept="image/*" class="form-control" placeholder="Image" aria-label="Image" aria-describedby="basic-addon1">
        <input style="margin-bottom: 1rem;"type="text"  name="title" class="form-control" placeholder="News Title" aria-label="Username" aria-describedby="basic-addon1">
        <textarea style="margin-bottom: 1rem;" class="form-control"   name="paragraphs1" placeholder="Write News..." aria-label="Write The News" rows="5"></textarea>
        <h1>Optional paragraphs</h1>
        <textarea style="margin-bottom: 1rem;" class="form-control" placeholder = "Paragraphs 2"  name = "paragraphs2" aria-label="Textarea 2" rows="4"></textarea>
        <textarea style="margin-bottom: 1rem;" class="form-control" placeholder = "Paragraphs 3"  name = "paragraphs3" aria-label="Textarea 3" rows="4"></textarea>
        <textarea style="margin-bottom: 1rem;" class="form-control" placeholder = "Paragraphs 4"  name = "paragraphs4" aria-label="Textarea 4" rows="4"></textarea>
        <textarea style="margin-bottom: 1rem;" class="form-control" placeholder = "Paragraphs 5"  name = "paragraphs5" aria-label="Textarea 5" rows="4"></textarea>
        <textarea style="margin-bottom: 1rem;" class="form-control" placeholder = "Paragraphs 6"  name = "paragraphs6" aria-label="Textarea 6" rows="4"></textarea>
        <button class="btn btn-primary" style="margin-top:10px;" type="submit">submit</button>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const div1 = document.getElementById('lateral_menu');
    const mainElement = document.querySelector('main');
    div1.style.height = '89.5vh';
    mainElement.style.height = '100%';
    });

</script>
