<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        $name = trim($name);
        return substr($name,0,1);
    }

    public function initial(string $name): string
    {
        $letter = $this->firstLetter($name);
        $letter = strtoupper($letter);
        return "$letter.";
    }

    public function initials(string $name): string
    {
        $arr = explode(" ",$name);
        $fnm = $this->initial($arr[0]);
        $lnm = $this->initial($arr[1]);
        return "$fnm $lnm";
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $nm1 = $this->initials($sweetheart_a);
        $nm2 = $this->initials($sweetheart_b);
        $s1="     ******       ******\n   **      **   **      **\n **         ** **         **\n**            *            **\n**                         **\n**     $nm1  +  $nm2     **\n **                       **\n   **                   **\n     **               **\n       **           **\n         **       **\n           **   **\n             ***\n              *";

        return $s1;
    }
}
