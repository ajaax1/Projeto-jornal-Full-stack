<?php $this->layout('master',['title'=>$title]);
if(!isset($_SESSION['logged'])){
    header("Location:/login");
}
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
  }
?>
<body>
    <main>
        <?php if (isset($error_message)) : ?>
            <p style="color: red; text-align: center;"><?php echo $error_message?></p>
        <?php endif; ?>

        <form action="/createNews" method="POST" enctype="multipart/form-data">
            <H1>Create News</H1>
            <p>Fill in the first 3 fields obligatorily</p>

            <div class="input-group mb-3">
                <input type="file" name="image" accept="image/*" class="form-control" placeholder="Image" aria-label="Image" aria-describedby="basic-addon1">
            </div>
    
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                News Title
                </span>
                <input type="text"  name="title" class="form-control" placeholder="News Title" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group" style="margin-bottom: 1rem;">
                <span class="input-group-text">Write The News</span>
                <textarea class="form-control"   name="paragraphs1" placeholder="" aria-label="Write The News" rows="3"></textarea>
            </div>

            <div id="textAreaContainer"></div>
            <button class="btn btn-primary" style="margin-top:10px;" type="submit">submit</button>
        </form>
        
        <button id="addTextAreaButton" style="margin-top:10px;" class="btn btn-secondary">add a new paragraph</button>
    </main>
</body>

<script>
        const addTextAreaButton = document.getElementById('addTextAreaButton');
        const textAreaContainer = document.getElementById('textAreaContainer');
        let counter = 1;
        const maxTextAreas = 6;
        addTextAreaButton.addEventListener('click', () => {
            if (counter >= maxTextAreas) {
                alert('You have reached the maximum number of Paragraphs (6).');
                return;
            }

            const div = document.createElement('div');
            div.className = 'mb-3 input-group';
            div.innerHTML = `
                <span class="input-group-text">Paragraphs ${counter + 1}</span>
                <textarea class="form-control" name = "paragraphs${counter + 1}" aria-label="Textarea ${counter + 1}" rows="3"></textarea>
            `;
            textAreaContainer.appendChild(div);
            counter++;
        });
    </script>
</html>
 
