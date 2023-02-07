function convertGender($gender)
{
  if ($gender) {
    if ($gender == 'M') {
      return 'Laki-laki';
    } elseif ($gender == 'F') {
      return 'Perempuan';
    }
  }
  return '-';
}