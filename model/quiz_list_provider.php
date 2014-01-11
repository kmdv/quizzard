<?php

namespace Quizzard;

interface QuizListProvider
{
    // Returns the number of available `QuizListItem` items.
    public function getItemCount();

    // Returns an array of `QuizListItem` elements. The array will be used, for instance,
    // to display a chunk of the quiz list as a list of HTML links.
    public function findItemRange($indexOfFirst, $count);
}

?>
