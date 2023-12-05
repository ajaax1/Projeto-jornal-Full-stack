<?php
$this->layout('admin/adminMaster', ['title' => $title]);
use app\database\models\querys\SelectNews;

if (isset($_SESSION['accept_message'])) {
    $accept_message = $_SESSION['accept_message'];
    unset($_SESSION['accept_message']);
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>
<section style="display: flex; flex-direction:column;">
    <form action="/admin/info/search" method="GET"  >
        <input type="text" name="parameter">
        <input style="margin-bottom: 1rem;" type="submit">
    </form>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Date</th>
                <th scope="col">Hour</th>
                <th scope="col">Id_user</th>
                <th scope="rowgroup">Options</th>
                <th scope="rowgroup"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (SelectNews::SelectNews() as $news) {
                echo('
                    <tr>
                        <th scope="row">' . htmlspecialchars($news['id']) . '</th>
                        <td>' . htmlspecialchars(substr($news['title'], 0, 20))."...".'</td>
                        <td>' . htmlspecialchars(substr($news['slug'], 0, 20))."...".'</td>
                        <td>' . htmlspecialchars($news['date']) . '</td>
                        <td>' . htmlspecialchars($news['hour']) . '</td>
                        <td>' . htmlspecialchars($news['id_user']) . '</td>
                        <td><a href="/admin/news/update/' . htmlspecialchars($news['slug']) . '">update</a></td>
                        <td><a href="/admin/news/delete/' . htmlspecialchars($news['slug']) . '">delete</a></td>       
                    </tr>');
            }
            ?>
        </tbody>
    </table>

    <?php if (isset($error_message)) : ?>
        <p style="color: red; text-align: center;"><?php echo $error_message ?></p>
    <?php endif; ?>

    <?php if (isset($accept_message)) : ?>
        <p style="color: blue; text-align: center;"><?php echo $accept_message ?></p>
    <?php endif; ?>
    <div style="display: flex;flex-direction: column; align-items:center;">
        <div>
            <?php
            $page = isset($_GET['page-nr']) ? $_GET['page-nr'] : 1;
            ?>
            <p style="text-align:center;">Showing <?php echo $page ?> of <?php echo SelectNews::fullPage() ?> </p>
        </div>

        <div class="pagination" style="display:flex;align-items:center;justify-content:center;">
            <a style="display:flex;align-items:center;text-decoration:none;color: inherit!important" href="?page-nr=1">
                <span class="material-symbols-outlined">first_page</span>
            </a>
            <?php
            if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">
                    <span class="material-symbols-outlined">chevron_left</span>
                </a>
            <?php
            } else {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;">
                    <span class="material-symbols-outlined">chevron_left</span>
                </a>
            <?php
            }
            ?>
            
            <div class="page-numbers" style="display:flex;text-decoration:none;">
                <?php
                $currentPage = isset($_GET['page-nr']) ? intval($_GET['page-nr']) : 1;

                $start = max(1, $currentPage - 3);
                $end = min(SelectNews::fullPage(), $currentPage + 3);
                for ($counter = $start; $counter <= $end; $counter++) {
                ?>
                    <a href="?page-nr=<?php echo $counter ?>" style="text-decoration:none;border-style:solid;border-width:1px;">
                        <div style="width:1.5rem;height:1.5rem;display:flex;align-items:center;justify-content:center;">
                            <?php echo $counter ?>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
            
            <?php
             if (!isset($_GET['page-nr']) and SelectNews::fullPage()>1) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=2">
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            <?php
            } elseif(!isset($_GET['page-nr']) and SelectNews::fullPage() == 1) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;">
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            <?php
            }elseif ($_GET['page-nr'] < SelectNews::fullPage()) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            <?php
            } else{
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;">
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            <?php
                }
            ?>
            <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo SelectNews::fullPage()?>">
                <span class="material-symbols-outlined">last_page</span>
            </a>
            </div>
        </div>
</section>