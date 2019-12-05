<?php

use PHPUnit\Framework\TestCase;
include __DIR__ . '../../app/detector/mutant.php';
include __DIR__ . '../../config/db.php';

class PersonTest extends TestCase
{

  public function testSetDnaFromJson(): void
  {
    $json = '{"dna":["ATTCGA","CAGTGC","TTATGT","AGAAGG","CCACTA","TCACTG"]}';
    $expected = ["ATTCGA","CAGTGC","TTATGT","AGAAGG","CCACTA","TCACTG"];

    $data = json_decode($json, true);
    $person = new Person();
    $person->setDna($data['dna']);

    $this->assertSame(
      $expected,
      $person->dna
    );
  }

  public function testSetDnaSecuence(): void
  {
    $expected = 'ATTCGACAGTGCTTATGTAGAAGGCCACTATCACTG';

    $person = new Person();
    $person->setDna(["ATTCGA","CAGTGC","TTATGT","AGAAGG","CCACTA","TCACTG"]);
    $person->setDnaSecuence();
    $dnaSecuence = $person->dnaSecuence;

    $this->assertEquals(
      $expected,
      $dnaSecuence
    );
  }

  public function testSetIsMutantTrue(): void
  {
    $person = new Person();
    $person->setIsMutant(true);

    $this->assertTrue($person->isMutant);
  }

  public function testSetIsMutantFalse(): void
  {
    $person = new Person();
    $person->setIsMutant(null);

    $this->assertTrue($person->isMutant == false);
  }

  public function testDnaIsAnalizable(): void
  {
    $person = new Person();
    $person->setDna(["ATTCGA","CAGTGC","TTATGT","AGAAGG","CCACTA","TCACTG"]);

    $this->assertTrue( $person->checkDna() );
  }

  public function testDnaIsNotAnalizableMinimumSize(): void
  {
    $person = new Person();
    $person->setDna(["ATTC","CAGC","TTAT"]);

    $this->assertFalse( $person->checkDna() );
  }

  public function testDnaIsNotAnalizableInvalidChar(): void
  {
    $person = new Person();
    $person->setDna(["ATTC","CXGC","TTAT"]);

    $this->assertFalse( $person->checkDna() );
  }

  public function testDnaIsNotAnalizableDifferElementLength(): void
  {
    $person = new Person();
    $person->setDna(["ATTAC","CCGC","TTATA","TAGCA"]);

    $this->assertFalse( $person->checkDna() );
  }

  public function testCleanDna(): void
  {
    $string = "ACTG";
    $this->assertTrue( Person::not_clean($string) == false );
  }

  public function testNotCleanDna(): void
  {
    $string = "ZCTG";
    $this->assertTrue( Person::not_clean($string) == true );
  }

  public function testCheckDnaTrue(): void
  {
    $person = new Person();
    $person->setDna(["ATTC","CAGC","TTAT","ATCG"]);
    $this->assertTrue( $person->checkDna() );
  }

  public function testCheckDnaFalse(): void
  {
    $person = new Person();
    $person->setDna(["AXTC","CAGC","TTAT","ATCG"]);
    $this->assertFalse( $person->checkDna() );
  }

  public function testIsMutantTrueSpecialCase6Horizontal(): void
  {
    $dna = [
      "AGGGGA",
      "CATTAG",
      "ACGTTG",
      "CCTAGG",
      "AATTGA",
      "ACTGGA"
    ];

    $this->assertTrue( analizeDnaSize6(sizeof($dna), $dna) );
  }

  public function testIsMutantTrueSpecialCase6Vertical(): void
  {
    $dna = [
      "AAGCGA",
      "CATTAG",
      "ACGTTG",
      "CCTAGG",
      "AATTGG",
      "ACTGTA"
    ];

    $this->assertTrue( analizeDnaSize6(sizeof($dna), $dna) );
  }

  public function testIsMutantFalseSpecialCase6(): void
  {
    $dna = [
      "AAGCGA",
      "CATTAG",
      "ACGTTC",
      "CCTAGG",
      "AATTGG",
      "ACTGTA"
    ];

    $this->assertNull( analizeDnaSize6(sizeof($dna), $dna) );
  }

  public function testIsMutantTrueSpecialCase5Horizontal(): void
  {
    $dna = [
      "CATAG",
      "GGGGA",
      "AGTTG",
      "CTAGG",
      "ATTGA"
    ];

    $this->assertTrue( analizeDnaSize5(sizeof($dna), $dna) );
  }

  public function testIsMutantTrueSpecialCase5Vertical(): void
  {
    $dna = [
      "AGCGA",
      "CATAG",
      "ACTAG",
      "CCAGG",
      "AATGG"
    ];

    $this->assertTrue( analizeDnaSize5(sizeof($dna), $dna) );
  }

  public function testIsMutantFalseSpecialCase5(): void
  {
    $dna = [
      "AGCGA",
      "CATAG",
      "ACTAT",
      "CCAGG",
      "AATGG"
    ];

    $this->assertNull( analizeDnaSize5(sizeof($dna), $dna) );
  }

  public function testIsMutantTrueGeneralHorizontal(): void
  {
    $dna = [
      "AAAA",
      "CAAG",
      "ATAT",
      "CAGG"
    ];

    $this->assertTrue( analizeDna(sizeof($dna), $dna) );
  }

  public function testIsMutantTrueGeneralVertical(): void
  {
    $dna = [
      "ACTA",
      "CATG",
      "ATTT",
      "CATG"
    ];

    $this->assertTrue( analizeDna(sizeof($dna), $dna) );
  }

  public function testIsMutantTrueDiagonalDab(): void
  {
    $dna = [
      "ACTA",
      "CATG",
      "ATAT",
      "CATA"
    ];

    $this->assertTrue( analizeDna(sizeof($dna), $dna) );
  }

  public function testIsMutantTrueDiagonalDar(): void
  {
    $dna = [
      "ACTG",
      "CAGG",
      "AGGT",
      "GATA"
    ];

    $this->assertTrue( analizeDna(sizeof($dna), $dna) );
  }

  public function testIsMutantCase6True(): void
  {
    $dna = [
      "AAGCGA",
      "CATTAG",
      "ACGTTG",
      "CCTAGG",
      "AATTGG",
      "ACTGTA"
    ];

    $this->assertTrue( isMutant($dna) );
  }

  public function testIsMutantCase5True(): void
  {
    $dna = [
      "CATAG",
      "GGGGA",
      "AGTTG",
      "CTAGG",
      "ATTGA"
    ];

    $this->assertTrue( isMutant($dna) );
  }

  public function testIsMutantTrue(): void
  {
    $dna = [
      "ACTG",
      "CAGG",
      "AGGT",
      "GATA"
    ];

    $this->assertTrue( isMutant($dna) );
  }

  public function testIsMutantFalse(): void
  {
    $dna = [
      "ACTG",
      "CATG",
      "AGGT",
      "GATA"
    ];

    $this->assertNull( isMutant($dna) );
  }

  public function testSaveExist(): void
  {
    $person = new Person();
    $person->setDna(["AAAA","CAGG","AGGT","GATA"]);
    $person->setDnaSecuence();
    $person->setIsMutant(true);
    $person->save();
    $this->assertNull( $person->save() );
  }

  public function testSaveDontExist(): void
  {
    $person = new Person();
    $person->setDna(["ACTG","CAGG","GGGG","GATA"]);
    $person->setDnaSecuence();
    $person->setIsMutant(true);
    $person->save();
    $this->assertNull( $person->save() );
  }

  public function testGetIsMutant(): void
  {
    $person = new Person();
    $person->setDna(["ACTG","CAGG","AGGT","GATA"]);
    $person->setDnaSecuence();
    $person->setIsMutant(true);
    $person->save();
    $this->assertTrue( $person->getIsMutant() == 1 );
  }

  public function testSave(): void
  {
    $person = new Person();
    $person->setDna(["ACTG","CATG","AGGT","GATA"]);
    $person->setDnaSecuence();
    $person->setIsMutant(true);
    $person->save();
    $this->assertNull( $person->save() );
  }

}
