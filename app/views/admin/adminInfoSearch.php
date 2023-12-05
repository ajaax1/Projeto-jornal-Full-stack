<?php
$this->layout('admin/adminMaster', ['title' => $title]);
use app\database\models\querys\SelectAdminsSearch;
SelectAdminsSearch::null();
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
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Create By</th>
                <th scope="rowgroup">Option</th>
                <th scope="rowgroup"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (SelectAdminsSearch::SelectAdmins() as $admin) {
                echo('
                    <tr>
                        <th scope="row">' . htmlspecialchars($admin['id']) . '</th>
                        <td>' . htmlspecialchars($admin['name']) . '</td>
                        <td>' . htmlspecialchars($admin['name2']) . '</td>
                        <td>' . htmlspecialchars($admin['email']) . '</td>
                        <td>' . htmlspecialchars($admin['createBy']) . '</td>
                        <td><a href="/admin/update/' . htmlspecialchars($admin['id']) . '">update</a></td>
                        <td><a href="/admin/delete/' . htmlspecialchars($admin['id']) . '">delete</a></td>
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
            <p style="text-align:center;">Showing <?php echo $page ?> of <?php echo SelectAdminsSearch::fullPage() ?> </p>
        </div>

        <div class="pagination" style="display:flex;align-items:center;justify-content:center;">
            <a style="display:flex;align-items:center;text-decoration:none;color: inherit!important" href="?page-nr=1&parameter=<?php echo$_GET['parameter']?>">
                <span class="material-symbols-outlined">first_page</span>
            </a>
            <?php
            if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>&parameter=<?php echo$_GET['parameter']?>">
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
                $end = min(SelectAdminsSearch::fullPage(), $currentPage + 3);

                for ($counter = $start; $counter <= $end; $counter++) {
                ?>
                    <a href="?page-nr=<?php echo $counter ?>&parameter=<?php echo$_GET['parameter']?>" style="text-decoration:none;border-style:solid;border-width:1px;">
                        <div style="width:1.5rem;height:1.5rem;display:flex;align-items:center;justify-content:center;">
                            <?php echo $counter ?>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>

            <?php
             if (!isset($_GET['page-nr']) and SelectAdminsSearch::fullPage()>1) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=2&parameter=<?php echo$_GET['parameter']?>">
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            <?php
            } elseif(!isset($_GET['page-nr']) and SelectAdminsSearch::fullPage() == 1) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;">
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            <?php
            }elseif($_GET['page-nr'] < SelectAdminsSearch::fullPage()) {
            ?>
                <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>&parameter=<?php echo$_GET['parameter']?>">
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
            <a style="display:flex;align-items:center;text-decoration:none;" href="?page-nr=<?php echo SelectAdminsSearch::fullPage()?>&parameter=<?php echo$_GET['parameter']?>">
                <span class="material-symbols-outlined">last_page</span>
            </a>
        </div>
</section>