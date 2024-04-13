<?php

namespace App\View;

use App\View\View;

class ViewExplorer extends View
{
    public static function drawExplorer(array $data): string
    {
        $html = '';
        ob_start();
        ?>
        <?php if ($data) { ?>
            <ul>
                <?php foreach ($data as $file) { ?>
                    <?php if ($file['is_dir']) { ?>
                        <a href="<?php echo $file['link']; ?>">
                            <li class="dir">
                                <?php echo htmlentities($file['name']); ?>
                            </li>
                        </a>
                    <?php } else { ?>
                        <li>
                            <?php echo htmlentities($file['name']); ?>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Unable to scan files</p>
        <?php } ?>
        <?php
        $html .= ob_get_clean();
        return $html;
    }


}
