<?php

declare(strict_types=1);

namespace Tests\Xmas2019\Day6;

use Jean85\AdventOfCode\Xmas2019\Day6\ObjectInSpace;
use Jean85\AdventOfCode\Xmas2019\Day6\OrbitCounter;
use Jean85\AdventOfCode\Xmas2019\Day6\OrbitGraphFactory;
use PHPUnit\Framework\TestCase;

class OrbitCounterTest extends TestCase
{
    public function testCount(): void
    {
        $centerOfMass = $this->createGraph();
        $counter = new OrbitCounter();

        $this->assertSame(42, $counter->count($centerOfMass));
    }

    private function createGraph(): ObjectInSpace
    {
        $centerOfMass = new ObjectInSpace('COM');
        $b = new ObjectInSpace('B');
        $c = new ObjectInSpace('C');
        $d = new ObjectInSpace('D');
        $e = new ObjectInSpace('E');
        $f = new ObjectInSpace('F');
        $g = new ObjectInSpace('G');
        $h = new ObjectInSpace('H');
        $i = new ObjectInSpace('I');
        $j = new ObjectInSpace('J');
        $k = new ObjectInSpace('K');
        $l = new ObjectInSpace('L');

        $centerOfMass->addOrbitant($b);
        $b->addOrbitant($g);
        $b->addOrbitant($c);
        $g->addOrbitant($h);
        $c->addOrbitant($d);
        $d->addOrbitant($e);
        $d->addOrbitant($i);
        $e->addOrbitant($f);
        $e->addOrbitant($j);
        $j->addOrbitant($k);
        $k->addOrbitant($l);

        return $centerOfMass;
    }

    /**
     * @dataProvider distanceFromSantaProvider
     */
    public function testCountTransfersToFindSanta(int $expectedTransfers, string $startFrom): void
    {
        $input = 'COM)B
B)C
C)D
D)E
E)F
B)G
G)H
D)I
E)J
J)K
K)L
K)YOU
I)SAN';
        $counter = new OrbitCounter();
        $you = OrbitGraphFactory::create($input, $startFrom);

        $this->assertSame($expectedTransfers, $counter->findSanta($you->getOrbits()));
    }

    public function distanceFromSantaProvider()
    {
        return [
            [4, 'YOU'],
            [4, 'B'],
            [4, 'H'],
            [1, 'I'],
            [2, 'F'],
        ];
    }

    public function testCountTransfersToFindSantaWithInputFromReddit(): void
    {
        $input = "CYP)BC6\nFPL)G1W\n6MM)5MX\nCXK)W4F\nTW9)KG3\n7LR)RVF\n9LK)MJF\nFZT)G7N\n4F5)YJH\nPJF)DJV\nJYT)3WQ\n839)Q21\n8CW)NGC\n564)8T3\nM86)3NM\nXSL)814\nMH7)LDS\nDKB)742\nFWR)NDK\nRFZ)B5P\nMLZ)YZQ\n3RK)FZB\nX46)NQ1\nY64)VDS\nH79)LPF\nG4Q)HSZ\n76X)37N\n5X1)7PF\nYT3)8RH\nQPY)32L\n3M3)XY4\nZ9Z)ZP1\nMZ1)H8X\n2RY)VW7\n8CB)L95\nRQF)1NR\nJRX)2N9\nYV3)4R2\nXKB)MFH\n13H)1BW\nWQS)XBR\nWQ9)GQP\nHGX)7G5\nZT8)7C6\nDHD)HSD\nTCX)7P7\n8NF)KTM\nFG4)V8D\nC49)DJK\nKBZ)MFF\n9SG)DBC\nYWQ)HF1\nY7T)7RN\n6YM)BV6\nB41)P1W\nPSF)NLC\n9VN)W8W\nYS5)6RK\nNLH)ZH9\nS8D)2BJ\n923)9RJ\nVGK)D33\nSL1)7LT\nZM4)S6L\nG1P)QFG\nRLW)6TK\nNDK)DXV\nDFN)7GM\nB6Z)FL7\n4JP)JCR\nDQF)8CN\n7PB)F3V\n7QM)116\n1WM)WS8\nLLC)1YP\nGP2)M37\nDX1)V6G\nVJZ)J4F\nYPL)J14\n712)2TM\n37N)9RS\nPV1)5F9\nDJ7)125\nTB3)JK3\nYZQ)G13\nNMV)M64\n9WN)B6Z\nQ62)3V6\n3NM)N21\nLBN)T51\nKGL)TQ3\n9P4)123\nTRY)24T\nK62)3QZ\nD3K)MZD\nQ33)GH3\n8PZ)DRD\n845)KZX\nFH9)G1P\nCT6)CZN\n39L)S1T\nGTP)HDP\nNYH)VFT\nZ7P)1B7\nG87)ZPQ\nM98)2PZ\nT6K)YQB\nKBP)8WY\nQ6F)VZC\n9Q7)DNQ\nY4T)C21\n5VW)G32\nK1S)Y64\n7TW)QT6\nTM2)LBM\nGZ1)HBJ\nK45)RPX\nDGB)NF5\nTZN)CQP\n3M3)TJ1\nSTY)VH9\n7KG)TSY\n9QH)6ZW\nTDN)TVJ\nZR4)KP8\nD6Y)56K\n4Q1)PQR\n3X2)WVF\nW4B)W6R\nSWJ)4Q1\nN6R)67W\nR5F)15N\nF17)GTS\n7MF)H1Z\n36V)KXV\n131)JZC\n5G3)KHV\nJ5R)HB2\n2CD)LFV\nMG5)YPV\n859)1Y7\n85D)6LW\nTFP)5CJ\nQZ2)JBW\nC7L)86Y\n1TJ)F5F\n4GC)VM9\nW6W)XV5\n5LX)H82\n4Q1)HL2\nC9P)1CZ\nSC8)WQS\n78G)P4B\nFF5)5PV\n36J)YMC\n8TM)QHV\n793)XS6\nP7F)TMJ\n46W)DC2\nYRZ)5F2\nGHQ)5VW\n7LY)W59\nFZ8)SAN\nW7K)R75\nZL8)HWH\nDJV)X7C\nMML)QCB\nD5Y)R6R\n2ZP)516\n9KL)V35\nP7P)HSN\nH45)RTT\nN6F)FWR\nGB3)LL3\nHPQ)LM3\n2XS)6MM\nYMC)HYL\nX7B)Z2N\n2ZD)217\nD33)X7B\nRKH)7TW\nMMV)131\n3TJ)L88\n5F6)BJQ\nMJ9)9FT\nK4C)M99\nNQM)HGQ\nRQ2)SB9\nJ5G)KD3\nX84)WF6\n794)M77\nSPD)844\nXTC)RW1\n7P7)KXQ\nP4G)64X\nBTR)57D\n32Y)SJP\nJ3W)9QH\nJTX)FPR\n3NW)2ZP\n8VC)PMP\nPSL)MR8\nH5F)BTR\n8BT)73H\nBSC)36B\nF14)9SP\nH1K)28T\n36B)SJ6\n8RH)RGP\nJF3)J3W\nSGC)DXB\nCHY)94Y\nRND)VJY\nG23)CVN\nMR9)FF5\nSB9)F2N\nNRK)9XQ\nJ14)8NS\nRJ1)578\nQG7)N41\nR8L)XMZ\n7SR)6W4\nB7P)2X9\nQRV)F9F\nLMZ)FB7\nF9M)DDH\nHB2)H79\nSM8)N1G\nGMT)5F6\nFL7)7MZ\nCS8)CKK\nCZV)89B\nSZP)NJZ\nN1G)H6Q\nXV7)JX6\n5L5)3C3\nJCR)7V3\nB9S)13H\n123)S8B\nRZ4)GR4\nPV7)FMP\n4RG)HX6\nBMB)82H\nRRK)KB3\nFPR)DP3\n826)8M2\nY1P)5KC\nYSP)Y61\n56T)MZ8\nJ8Q)HTW\nZ4C)DTK\nWBP)8WP\nPN3)7KT\n7KT)XK9\nLDD)2TP\n2X1)HZR\nSZ9)WLP\nFH9)Q9W\n4L4)T4W\nFRS)BMK\nBTH)WQF\nMX9)3ZQ\nDG6)K6D\n5TR)HD8\nKV3)WW3\nVCB)BJV\nBMK)MX9\nQT6)8VC\nYDT)NH2\n85Y)4JB\nGXT)V4Z\n7T6)XK4\n8YR)SL1\n9WL)MPZ\n58H)H5Z\nL7D)MG5\nMNN)5GT\nCVN)4M3\nXCP)MZJ\nJX6)BMB\nF9M)VT3\n246)3SW\n1NX)MG7\n6PG)SL3\n1PR)8XF\nRF7)W6W\nVW7)S1D\nHKB)C2Y\nLH6)Y4T\nDLN)4GC\nN8R)YK3\nQVZ)M3Q\nWPW)9TS\nPLX)PX8\nF5P)FC6\nDVZ)D5Y\n91S)XCH\nJ2F)NSL\nX9G)PN3\nH8X)84H\nMD9)C8Z\nQNX)CWY\n57D)YWX\nMGF)7Y6\n24W)V27\n5WV)W7T\nVRF)FPL\n844)JVP\nTWX)Z6B\n63P)2T7\n7C6)VR3\nC1M)LKR\n4ZP)BJG\n9D4)69B\nGQP)CTM\nVCK)R59\nHDB)CVL\nWQH)M86\nDRD)62D\nVRR)KV3\nXLD)5R2\nB36)55B\nF69)7T6\n36B)NLJ\nB5P)Q4Z\nY27)GDG\nLHR)DG8\nZQQ)CKC\nCYX)SMY\nRBF)CBG\nPRF)PRH\nWW3)B28\nDYL)2ZX\nRGP)YNJ\nDNQ)4R4\nQCB)PBV\nSK7)7QR\nM4S)PJ5\nD15)NX8\nMZD)BRP\nS1B)Q5H\nM9V)VSJ\nVGK)CGY\nGC9)LKT\nSDD)F31\nKK3)LCB\n1FF)4WC\n87N)BVX\n76M)1RN\nZS5)RND\n374)VPW\nQBW)X2Q\nG51)63B\nMC9)F35\nT73)JTY\n24V)QJN\nMWN)S57\nNHV)DHT\nY3K)D81\nS6L)J5G\nWSS)32Y\n3SH)K74\nSMY)JBJ\nZXP)212\nZ85)RM5\nHZC)9VN\n6F6)8BT\n845)KMW\nJLZ)ZMW\nNDB)1MY\n7ZV)DG6\nKNN)46W\n34H)L5Q\n87Q)J3K\n4MP)Z7P\nBJD)K2R\nJ31)R2N\n585)7HL\n3FP)JQS\nPYG)Q1N\nDC2)WGW\nH95)4M1\nQK3)13Y\n6N4)T87\nK4Q)626\nHDF)FFQ\nTX9)B6S\nJTY)ZWR\n94M)Y9F\nG32)BHL\nS4X)JF3\n687)ZV9\nQLX)T9F\nBYK)2XC\nPG4)XZ6\nF7R)44V\n7VL)QFR\nDGG)CB1\n498)ZS9\nS67)X3Z\nB22)68Q\nG92)K3K\nHG7)KBP\nV8P)TZN\nXZ6)TQD\n8GG)TRY\nHLF)FRS\nYP6)X6X\nPB2)R9Y\nPCR)L8X\nXNT)H22\nHSD)Y54\nTD1)NDB\nZMW)JYT\nBB8)GSN\nVN6)P6Q\n63Y)QD2\nQGJ)9ZM\nXMZ)JS6\n3BC)P7R\nG13)MMC\nDBK)96C\n7WG)1F5\n626)HYQ\n96C)DFN\nB39)NVP\nQF9)6NZ\nF3V)FVQ\nJYS)GMT\n523)SVM\nRQ6)VF4\nG7N)Z31\nV8D)YRK\n7GM)QS6\nCGY)CBZ\n7X4)D4K\nHLS)V3C\nVDS)39L\nKNN)GC9\nQS7)DZN\n4C3)QX4\nQTK)QVZ\nRTS)8PZ\n486)FZ8\nNR7)HRL\nGLJ)XLD\nCWY)QV2\nNH2)54M\nWZ3)JZS\nTFK)TQN\nT5K)SF6\nLPR)WB3\n6WM)354\nR9B)T37\n26S)JJG\nS24)TCZ\nD5L)KSB\nKVZ)YT3\n7SL)F7R\n8SJ)LQ2\n5G6)C23\n1RN)PSG\nBVX)T8Z\nX5N)G5W\nY1P)52M\nKH1)2YC\nRW1)ZY6\n5CJ)7BB\nWWS)VDF\nC8Z)L5G\n7QR)79Q\nNSR)SXK\nBRP)KNN\nTJS)PRZ\nBMB)T4X\n7RG)K9C\nHFP)HDB\nNGC)B6T\nBDR)HW3\nNK7)JY9\n71W)LWT\n7G3)JVR\n8M2)XWZ\nRFB)MYL\nHDP)7S5\nWQQ)7QM\nQ5H)NKM\nZRF)1XC\nYNJ)D8S\nM99)5G3\n4PS)X1V\nTCC)LQW\nFD7)BTH\nPX8)LSF\nP9J)JQR\nS15)C36\nRNY)S4G\nXS6)WCB\nC5F)C7P\nKKD)XR5\nT7K)J3V\nHKS)JPL\nRK1)65J\nDWY)479\nD8S)4RG\nDV2)T59\n9TB)D26\nV27)8NL\nL2V)3M3\nHX6)6H7\n8NS)9P4\nTFR)7HD\nSJ6)TK2\nTCC)7ZP\nD3F)TMM\nRK6)L17\nRK6)HZC\nBF7)ZTP\n52M)1M7\nMB3)S4B\nL5J)3P8\nVCB)MXP\nS1T)T5P\nDHS)NSR\n131)4BV\nVWR)R8L\nK1D)9LK\n796)QRV\nCYZ)N31\nMMC)HH6\nLSF)YZJ\nQS6)2ZS\nDV9)K65\nKT9)P27\nCKK)6NB\nV4Z)D6N\n9WL)5J9\nP88)HLF\nTMM)7HN\nXBQ)JG5\n97N)81P\n5VH)SDZ\nMHF)QP6\nNXM)3X2\nB3L)ZQL\nBM7)4F5\nZGZ)PQS\n59F)F7C\n6T3)59W\n99C)K1X\nBTK)4L4\nM96)D9B\n63Y)7KG\nNF5)R4C\nSZT)K5G\nHZ1)KKD\nC3J)J1S\nQ21)NKR\n1NC)CF2\nSVJ)GJB\nWNB)12X\nQM3)RF4\nHW3)VZV\nRTT)DT8\n7L5)62G\nJ4F)8DJ\nLQW)77T\n7GH)X51\n33T)5JR\n4LX)HC2\n5JR)8CB\nM5S)VT6\nGR4)5HD\n9X9)PLW\nPQL)WWB\nJY9)9SG\nSJF)H9D\nD9B)9JF\n9XQ)BT2\nRBD)JQY\n5F9)TRS\n5MT)XSL\nXHP)MMW\nHSN)17L\nQCM)PGF\nBVF)YBG\nJS6)S1B\nGZ5)B6L\nYM2)8YR\nP7R)NK7\nJ2B)J2F\n9LF)S9G\n4M4)Z9Z\n7S5)KY9\nM37)22M\nQPV)Y1P\n8CH)V9L\nB6S)GTN\nX6X)XLH\nGKT)7RW\nP6D)8W3\nBJQ)Z4C\n3ZQ)K1D\nL57)BZR\nXFX)Z5Y\n94Y)F83\nDXC)8W2\n37S)GS4\nZTH)JX2\nDP3)LYY\nXBR)6JF\nTTY)G51\nVL3)SRQ\nBNQ)5S8\n62G)TMW\nJK3)XWW\nWDJ)KDJ\n4M1)NGJ\nQ1N)81K\nG7R)GP2\nLKT)7ZV\n8NT)ZXP\nKXQ)LSZ\n12X)PD2\nL1N)WZY\nZY6)TT4\n7P7)6T1\nQ2T)HDF\n1HW)1CD\nNTG)5BS\n6G9)WVJ\nF5P)GML\nVJD)WWS\nYVW)PM3\nP2Y)ZZ4\nJYK)L57\nNN1)TW9\nB69)YZZ\nGRW)2XG\nJ4Q)HHB\nK74)F25\n55M)5LX\nWR5)JTM\nDDG)NRK\nY65)MC9\nWVF)PSF\n6CD)ZGZ\nGSN)Y5X\nBX1)ZHN\nCLT)SPD\n4R4)R2K\nJPP)1GH\nNKM)PY5\nQH8)M8Y\nJRX)6WM\nZ3T)28Q\nSVM)78G\nXK9)4BW\nZR4)X9G\n5B2)X6W\n4BS)5NX\nTT4)MGF\nTQ1)M4Q\n9KS)YWQ\nW8W)M8T\nQBT)CXK\nN41)QLX\nCNV)6PG\n6T1)99C\n125)V2S\nQPD)QNX\nH5Z)2KX\nP9S)1XM\n15N)4SM\nFJ4)MNL\nYPL)JDP\nP8L)PLX\nWVJ)SQC\nV9L)G4Q\nY9L)K1S\n1SS)F8X\n9WR)F7H\n167)15K\n814)MSC\nZ56)BSS\nD5L)NHG\n2R5)QGJ\nGWT)LPR\nZM9)RWL\nXK4)XVV\nX2Q)HGG\nRLY)2RY\n837)7L4\n7X4)ZL8\n1Q3)1TJ\n2KX)Z44\n6W4)ZM1\nC7J)8J1\n17L)TD1\n1F5)L2V\nWDQ)ZK3\nYY8)SFX\nH82)4HJ\n28T)D94\nF5F)XMT\nKP8)BZ8\n116)9KS\nGSK)K66\n6QB)HD7\nNGP)4X5\nPRZ)TTY\nWRZ)2YT\nBJG)SGR\n7ZF)TFK\n1MY)826\n825)PGZ\nPJ5)9WR\nPV1)XV7\n516)85D\nLQK)M96\nB6L)LZK\n2TM)DYR\nFYH)SZ9\nLKT)LTW\nPDT)79D\nWQQ)DYT\n7PW)F81\nKSB)CNV\nBGN)XQJ\nMC6)ZVC\n2XC)M4S\nF7B)PZ2\n1YP)QVB\n2FY)KT9\nTQZ)S7J\n3V6)9T9\nCBG)XS5\nR59)DLS\nGT6)793\n4BS)FT7\nXY4)6LN\n9VF)FH9\nGSV)6PV\nV4H)JLP\n72K)CQS\nDLN)ZVL\n7RS)RQF\nK2R)J94\nM64)94M\n5FD)FJX\n5PV)R11\nS4B)CVQ\n66K)WBP\nDZK)Z5S\nMZJ)PCR\n2FY)BYK\n8J1)7RT\nN31)GPX\n7Y6)HQC\n6CQ)W75\n7BP)7SL\nNCL)3FP\n6JF)YPL\nXJH)Z56\nX6W)CHY\nS27)5KS\n96R)ZT8\nP71)SGT\nYQB)B8S\nMZ8)DBK\n2MY)NX5\nGHK)N4C\n5GT)YS5\nP5K)1MP\n96D)QM1\nTVJ)PWV\nVTR)X84\n7HK)78Q\nMQK)GBL\nMXW)MWN\nMNL)VMK\nNHM)PQL\nWXW)RXQ\nB34)1NC\nJ9D)Y55\nV8Z)PDT\nMB7)24V\nFTQ)8WG\nVFT)XCY\n22B)8NT\nC4W)4ZP\nJG5)WSW\nPGF)15T\nF7H)8CH\nL2W)9HB\nJLZ)F5P\nSRV)HQ3\nSLJ)TGQ\nNJZ)C7L\nM77)DHD\nQVB)165\nZ6B)QM3\nHGQ)QB2\n15C)M31\nK1X)FKS\nRXQ)G7Z\n7TF)DKC\n7G2)7PM\nBNL)KGL\nB52)VRR\n81P)VGK\nP61)LMP\nFB2)LBH\nY3Z)5VH\nLBD)X4F\nH35)CSR\nQFR)C9P\nDQ9)54N\nTJ2)5TR\n93B)SP7\nBX1)98H\n1BQ)BSC\n4WC)WR5\nVT6)HR2\n2BV)J4T\nHVC)3F7\nSNP)845\nV6G)8CW\n585)WC9\n6GZ)C5Z\nVWY)LVH\nQV2)VL5\nHNT)V4H\nHX7)W7K\n4HJ)BVF\nMZ1)JY6\n7DG)69G\nLZK)673\nV16)SJF\nN8R)8XP\nSQZ)BTC\n63B)66P\nMKY)SDD\nTR2)6R9\nDYT)5WV\nV9L)CYX\nSJP)R9V\nZTP)NJ6\nXVV)DC7\nSNP)VJZ\n77Y)NYH\n8G7)WDH\nZRX)HNB\nB6G)QCM\nY82)V9B\nKVL)FGP\nCFQ)K4Q\nT87)GHW\nMJG)WKH\nDDH)FNZ\n86Y)CDJ\nLBN)5HX\n7JB)4Y3\nKG3)8CC\n2XG)Z95\nCWH)3NW\nNB7)MC6\nDC2)6Y9\nGWD)RPZ\nGYH)JTX\nPQR)6GT\n7PF)F8G\nBJV)D1M\nGDN)MHF\n54N)W4B\nX1V)3LL\nY3Y)VWY\nT17)Y65\nBVR)H1K\nH42)56T\n22M)BW9\nCS8)71W\nKMW)143\nWWS)RQ6\nNMV)J4Q\n58F)V8P\nMPZ)Q33\nDDX)Y3B\nLPF)7HH\n9RS)RLY\nLQW)CWH\n9Q7)ZZ9\n5S8)96D\nD7B)YFZ\n8WY)HLS\n4SM)P6M\nWC9)ZTD\nJ94)N6F\n7L1)2TC\nYGY)XW6\nHBQ)2X1\n742)C49\nDQ4)S4X\nL8X)B39\nWXY)YVW\nJX3)YMS\nZWR)3RK\nTDH)P14\n58H)9BX\nY4Q)8Z6\nVCK)KGY\nP14)T6K\nQB2)96R\nP7B)FH8\n9RR)2VJ\n15T)TLN\n75Z)GVQ\nN8D)G92\nG7Z)KR3\nHTW)X7W\nCTC)CYZ\n59Q)HKB\n87N)2BX\nGH3)87W\n663)RG4\nDZW)797\nZNV)MYM\nC1C)SM8\nHYL)P88\nSPB)CZV\nS4G)S9M\nD7T)J6J\n3SW)S7Y\nYS5)DDG\nWJC)7SR\n98H)885\nCPT)BGN\nGQD)SLJ\nXQ7)Z2T\nY5W)55M\nTFR)4PS\nHQC)SQK\n4M3)VPP\nGCH)BZ9\n644)G5N\nMXP)JYN\nCBZ)RB3\nRGH)SJZ\nGVQ)MVL\n2WK)MR9\nSL3)JRX\nVT3)58F\nG1C)J9C\nKB5)C5D\nVT6)SP9\n578)ZTH\nGBL)H69\nM8Y)6DP\nCTM)B69\n28Q)7DG\nH5K)WS7\n1NR)62Y\nF54)HPQ\nGV6)V8Z\nY1D)D15\nFFL)J6R\nZ2N)7WG\nR2N)M9V\n21Y)FVT\n7RS)5S4\nZ19)KJY\nW9C)JD5\nNNM)NHT\n24T)DGG\nGB3)GV9\nMYL)XF3\nH9V)FFL\nQM1)KVL\nWBP)M7J\nF7C)JWR\nBWZ)LMZ\nZ5Y)7S6\nCOM)HKS\nXFT)GB3\nHH6)XFX\nR2X)KV7\n5W2)F9M\n4CK)RFB\n71W)8GG\n8XP)825\nTLN)QXJ\nWD9)TXX\nR6R)WDY\n4N7)DQ4\nNKW)85Y\n28N)4GR\nSRQ)NR7\n3SP)63P\n99K)GHK\nVZC)DYL\nD7H)LQK\n7HK)H1F\nD6N)TG1\nP82)C56\nJX2)WD1\nZHN)CTR\n5KC)S27\n24D)7HW\n77Y)V1H\nN21)Y3Y\nDJV)STY\n5YQ)837\nZ31)H4N\n9FT)7PB\n79Q)GKT\n6JX)QH8\nKR3)8ZQ\n955)4CK\n2X6)L78\nZMW)RBD\nD5P)9WL\nXMT)PFQ\n5MX)KP2\n8Z6)CT6\nT59)NN1\nCZG)N8R\n171)712\n5FJ)CND\nYGY)RTS\n6RK)5PY\nLVL)P49\nTPK)34H\nS8L)59R\nDXB)LDD\nM8T)NCL\n5RG)22B\nF2N)DGB\nW9Y)26L\nN8F)VJD\nQ4Z)R3P\nV35)QZW\n13Y)GL2\nXZ6)RY8\nW6R)9D4\nR75)P71\n3TX)9K6\nD1M)XHP\nHQ3)KG1\nD4K)585\nRGN)HG7\nFJX)BVR\nNVP)XSV\n5BL)GZ5\nTSY)PG4\nZV9)DLN\nNVN)BTK\nM31)QPD\nVKS)66K\nYPV)MQK\nL5B)5JH\nHL2)9VF\nH9D)SWJ\nJ3S)XNB\nT2J)YOU\n3LL)7PW\nH88)ZRF\nNQ1)1SS\nXFS)RW5\nGPV)NZ3\nTK2)RXV\nCC8)VKQ\n6FV)CVD\n143)GSV\nT5P)Y1D\n7G5)7ZR\n69B)Z85\nYFZ)XKZ\nMFH)8CK\n4GR)PSL\n2HK)5W2\nJ3K)7BY\nZP1)CQX\nJGR)KVZ\n199)75Z\nVL3)5B2\nN34)QG7\n2T7)QPY\nGDG)3TJ\nS57)VTX\nY61)WXY\n9ZK)JL4\nZJJ)J69\nQNX)DJ7\nSXK)Y82\nR9Y)DDX\nZ95)YZ1\nCQP)PV1\n1CD)24D\nJQY)TDH\nP9Y)WQ9\nW87)69S\nM7J)421\nXKV)RJH\nMG7)Y5W\nBJV)GLJ\nM37)RK7\nHHB)5FD\nLJ4)7Q5\nZ5S)TCC\n5NX)XYH\nBZR)MQV\n5HX)5DV\n2CG)32G\nX4F)N4V\nDFZ)P7B\nDVP)Q6F\nPWV)TB3\nS9G)TY2\nJ4T)CPT\nLFF)YDT\nTMW)L5B\nHJJ)B2N\n1G6)RFZ\nK2R)HN4\nPZ2)FRG\nFB7)8SV\nHZR)S8L\n1GW)486\n8W2)T97\nSJ5)L1N\nF8G)58H\nC36)DFQ\nZDV)FG4\nDFQ)GRW\nXWZ)21Y\nGPG)8SJ\nKJY)GSK\nRKK)VV6\nZVC)4ZL\nVSJ)MJG\nTBG)FD7\nSHX)RW4\nLF9)9LF\nZV9)KV5\n8DJ)SJJ\nJLP)XKV\n8SV)171\nSGR)WDQ\nVH9)D3K\nF9F)W1Q\nVM9)8MH\nQX4)PB2\nT9F)TBG\nJG4)4LT\nKKD)7QN\nNSL)W87\n57J)VB6\nWDY)7BP\nGSN)2XS\nFKS)1NX\nQFM)PS9\nKGL)VSY\n5Q8)G83\nD5Y)WRZ\nLKR)CLT\nDST)TM2\nKHV)YGY\nXJH)N8F\nM8Y)BQ7\nQHV)YWT\nYK3)D5P\nKV5)8F3\nDLS)5BL\nP5F)ZL2\nRVF)GT6\n4BV)97N\nS8B)62C\nHRL)7BF\n1Y7)P9Y\nWNT)36V\nCVD)G1C\nD1Z)3SH\nPLW)2CG\nZ6L)Y8G\nZZ9)GR3\nG83)1WM\nN38)J8Q\nMJF)7JB\nD1F)1Y3\n8Y5)ND3\nK51)YY8\n1BW)Y27\nGML)MNN\nRF4)2Z9\n4BM)T73\nGS4)LFF\nKTM)WFB\n85D)NH8\nMCD)WM4\n2T5)811\n8ZQ)B9S\nJV1)JHZ\nJDP)B7S\n7DG)ZNV\nG5K)Y4V\nM5Y)BZC\nG5N)YZ2\nXQJ)7NN\n54M)CDL\n8TV)41S\n3JL)6F6\n1MP)2T5\nVZV)NSP\n5S4)MB3\nBXT)5FJ\nK9B)X5N\nH79)72K\nB2N)8NH\n7HD)7G3\nJZC)L7D\nWF6)Z3T\nVPW)TFP\nGMV)CZG\n7PB)2HK\nW1Q)37S\nZM1)LMJ\n14Y)36J\nYZ1)CL9\nZDF)2SC\nHYL)SNP\nZ44)199\n6ZW)C4W\n7VR)5L5\n13V)1FF\nCDJ)JBL\nYWT)GV6\nH22)7N5\nCXR)7HK\nJ6R)T5K\nGR3)TX9\n73H)9YN\nKV7)JX3\nMYM)15C\n66P)MXW\n7ZR)9W5\n1WM)JYS\n4BC)478\n3FP)P7F\nDHZ)6T3\nGJB)Y3K\nHNB)LP6\nPY5)6CQ\nJ3W)MD9\nXCH)GZ8\nB5P)9PL\nZD2)WD9\nSJJ)M9T\n9W5)DCP\n5B2)ZM4\nJY6)26S\nY55)W37\nJ69)VN6\nWM4)RNY\nQBJ)QPV\nJ9C)GTP\n8YQ)H42\nW78)ZS5\n8MH)C3J\nMSC)7RS\nHPJ)WMS\nK66)R5F\n7SR)5MT\n8W3)28N\nTQ3)9KL\n2CX)HVC\nPY5)76X\nT9H)2SD\nBNX)97Q\nXK9)MZ1\nPQS)DH1\n1TS)ZR4\nK9C)K8D\n67W)L8T\nCKC)BCX\nLMP)7LY\nNBD)XQ7\n6Y9)61W\n1SK)NQM\nP1W)RLW\n7LR)B52\nK5G)T2J\nR2K)D1F\n7MZ)BWZ\nDYR)BNQ\nRPZ)M5S\n6NZ)V16\nZK3)H35\nJ3V)HGX\n2Z9)D7T\nCF2)TGK\nNH8)2BV\n3F7)QK8\n8NH)YP6\nR9V)MJ9\nGL2)VRF\nBWX)1X5\nSMH)923\nN4V)ZN7\nP4B)B36\n537)GWD\nCHF)XNK\nKGY)F54\n1Y3)QLD\nTJ1)SGC\nXS5)RQ2\nNFN)RM6\n343)NGP\nR8L)NMV\nTSY)K2H\n7HN)P9J\nWSW)KK3\nXKZ)D5L\nLF9)5WX\nTY2)93B\nHYB)87Q\nC56)DHZ\nL5G)4BC\n9SP)P4G\nDVP)L9C\nDJ5)Z6L\nKMP)SV3\nH19)TDN\n1B7)9WN\n797)P82\n6PV)WNB\nDBC)DRK\nJWR)J2B\nMX9)SPB\nFSN)BF7\nSQC)NBW\nWKH)CMV\nPFQ)QS7\n3WQ)DDB\n354)F17\nRLW)RF7\nTGK)4WP\n87T)W78\nK1T)XTC\n4T1)DZK\nJQG)5Q8\nZ6B)V82\nJPL)57J\n2QG)FJ4\nL17)W9C\n62C)YRZ\nP6M)8FV\nQD2)RGN\nC23)3B3\n8CN)ZDV\nBW9)JG4\nZ2T)523\nFFQ)99K\nFRS)RBF\nMG5)7LR\n6LN)QBT\nK3K)QTK\nWMS)S67\nGH3)FB2\nK6D)ZRX\nTMJ)9PH\n2PZ)8YQ\n97Q)RGH\nF8X)HBQ\n5NT)H19\nC4W)6YM\nF81)Q62\nJQR)HB5\nFZB)R9B\n59W)9ZK\n84Y)9VY\nT8Z)YPG\n9PL)MDM\n3TX)7G2\n1X5)1GW\nKP2)BX1\n1M4)K51\n9TS)794\n26L)H5K\nHH6)2FY\nHWH)9X9\nRW5)MLZ\nP9S)GCH\nHD8)6CD\nRJH)PM2\nYJH)4BS\n46H)2WK\nRLP)D3F\nCDL)VTR\nM2V)KFH\nQX1)DX5\n2X9)H6R\nWS7)BCZ\n2VJ)TR2\nFVQ)1TS\nKFH)6N4\nH1F)T3D\nLQ2)SJQ\n79D)XCP\n2RR)P7P\nDS8)PYG\nK84)9T5\nC2Y)T7K\nM9W)9H6\nDRK)8QX\n69G)HJJ\n2ZD)4H2\nBCZ)SQZ\n5WX)91S\n87W)BLG\nXR3)9Q7\nNLC)KS4\nZPQ)XFT\n68Q)S8D\n8RH)564\nBZ9)NCK\nDBS)J31\nS7Y)NSH\nJBW)QLF\nCQS)SZP\n8CK)GPG\nF35)PRF\n562)LJ4\n7S6)2X6\n8FD)C5F\nTRS)CNS\nDKC)1G6\n9PH)4C3\nHR2)1PR\nJBL)ZD2\nFH8)JGR\n1CZ)Q2T\nPS9)ZM7\nFGP)P8L\nVDF)G7R\nRY8)644\nZXM)WYR\n1SS)VCB\nW37)MTQ\nTQZ)NB7\n9RJ)DVP\nRB3)GYH\nMZD)N8D\n68D)LKC\nMMW)CHF\nLWX)ZJJ\nGV9)N38\nT3D)Z19\nLL3)H9V\nRR5)T8X\n5Q8)L13\nF8B)PV7\nBZR)63Y\n1YT)MJ5\nL5Q)87T\nB2J)Y4Q\nK1R)9D5\n59R)QFM\nJTM)9RR\n2SD)ZD7\n1M7)3JL\nNX8)FSN\nLBM)M5Y\nYW6)YM2\nGWV)955\nP31)1YT\nCND)VM2\nPGZ)5CM\nBLG)N6R\n4W3)LLC\nWVJ)VL3\nL88)J9D\n837)8FD\nXW6)NKW\nGPX)GQD\n858)5S1\nNSH)HPJ\n3B3)415\n9RZ)7GZ\nB28)MPM\n7PM)SB1\nBSS)M2V\nJPX)WZ3\nVL5)RRK\nT51)JJ2\nNLJ)FZT\n9L9)R1T\n5PY)8TM\n9T5)8TV\nDDB)XVJ\n4SM)VCW\nTSH)Y9L\nKS4)WJC\n55M)S24\nCQX)DXC\n8WP)P2Y\nDQ4)13V\n9BX)CS8\nD4K)XKB\nV82)DVZ\nC7P)D9D\nMFT)J4M\nWS8)DFZ\nLZ6)J3Q\nFKS)TFR\n78Q)LZ6\n16R)FYH\nGTS)DV9\nH1Z)7JW\nH5Z)WPW\n5HD)RKH\nBT2)RJ1\nTXX)B6G\n212)RKK\nVPP)WSS\n1XM)YV3\nJJG)BMW\nVR3)PHX\nLWT)24W\nCVL)D7B\n923)JV1\n1SK)K62\nP49)P5K\n7L4)QBJ\nWGW)3NQ\nX7C)3SP\nKZX)2QG\nCL9)VWR\nHSN)P5F\nM8M)XWS\nDWY)DST\n7HL)8G7\nPBV)W2Y\nGQP)4LX\nQGJ)MH7\n885)WXW\nL9C)NFN\nYPG)SH1\nVSY)H5F\nJSR)VWV\nWDH)14Y\nKHV)DBS\nJ3S)SC8\nTXX)B3L\nXF3)H95\n4LT)GZ1\nMLZ)S15\nZS9)NLH\nF14)ZP3\nKB5)SVJ\nLP6)44K\nZL2)MML\n9ZM)GMV\nJQS)2GY\n5J9)69X\nSH1)JPP\nD26)5F8\nDH1)RK6\nD6D)SZT\nW2Y)ZSL\n15K)P61\nGZ8)4W3\nYJ4)461\nLM3)K45\nR3P)TPK\nHN6)GHT\nW7T)GZT\nJVP)43H\nLP6)GWT\n246)CC8\nN9G)J5R\n7NN)DCC\nLBH)F7B\n2TP)YL5\nRM6)5RG\nKWL)RZ4\nHHB)7X4\nGR4)984\nM9T)HGK\nM4Q)JYK\n2GY)ZY8\n8GG)RSR\nF25)D6D\nQJN)68D\nNJ6)687\n5KS)TYC\nF83)197\n9K6)XR3\nYZZ)BNL\n5RG)HN6\nF31)2ZD\nBMW)6G9\nQFG)46H\nJCR)LWX\nHN4)VRM\n6TK)Y3Z\nS7J)K9B\n3QZ)SD7\nW59)Q2Z\n99C)B2J\n61W)JPX\n4ZY)SHX\n8XF)87N\nNSP)S2S\nZTD)859\n3NW)M8M\n2YT)C7J\n421)XJH\nT73)F69\nZNV)YW6\nQBJ)Y7T\nV2S)MMV\nZD7)Z15\nJRN)VKS\nZM7)QK3\nC84)GHQ\nC5D)KJB\nDBS)SJ5\n7HH)H88\n165)R2X\nXNK)FTQ\nRK7)P31\n84H)858\n7RW)X46\nXLH)VCK\nDHR)DZW\nGTN)TNP\nHYQ)4N7\nRW4)7ZF\n43H)M98\nX7W)5G6\n6GT)839\nCTR)Z9F\nQ8P)GDN\n8FV)6QB\nL13)2RR\nZVL)KBZ\nQ2Z)JLZ\nBC6)WQH\nMJ5)69L\n4R2)G87\nSFX)77Y\nBWZ)KMP\nSTY)343\nT4X)1HW\nWQF)TSH\n4X5)3TX\nG23)JSR\nDNQ)YJ4\nJHZ)F14\nS42)DWY\nHB5)YJ6\nHGG)XMD\nLYY)KMJ\nXYH)BXT\n7BB)B7P\nZSL)G5K\nG1P)L2W\nMFF)HZ1\nJJ2)N34\nM8M)7TF\nFC6)MFT\nW59)QHK\n5DV)QZ2\nJ5G)6GZ\n8T3)5YQ\n7QN)8Y5\n1X5)SX3\nDV2)H45\nRXQ)4M4\nL78)LG1\nKG1)ZM9\n8QX)QSH\nMQV)RLP\nHD7)B8D\n82H)7VR\nZP3)DHR\nCNR)LVL\nWR5)9RZ\n7BY)LBN\nZVC)CXR\nQ9W)DQF\n2BJ)TCX\nJYN)HYB\n64X)WNT\nY9F)QBW\nBZ8)2R5\nPJ1)K5T\nTQN)BJD\nXVJ)BB8\nS2S)BWX\n2ZS)K4C\nVTX)P6D\nKY9)TJS\nQHK)5X1\n3WJ)L5J\nSX3)CFQ\nLCB)XTM\nMJP)DKB\nCSR)ZML\nXR3)B41\nJD5)N9G\nJPX)1BQ\nRWL)DX1\nYBG)QX1\nM33)MKY\n5S1)D6Y\nTRS)5NK\nTNP)LH6\nCNS)MCR\nJ3Q)KWL\nT4W)8W9\nVJY)6WQ\nJBJ)PJ1\n2RR)Q8P\nJ4M)WQQ\n69S)TJ2\nNCK)16R\n6H7)QF9\n8Y5)J3S\n77T)LBD\nKB3)JRN\nFNZ)1Q3\nKJY)DHS\n44V)GWV\nNHG)TWX\nVRM)BDR\nYZJ)BNX\nDC7)YXN\nMR8)G23\nMCR)BM7\nHGQ)7L5\nYL5)NBD\nQB2)DJ5\nCB1)4JP\nBZC)7RG\nVJZ)3BC\nVWV)M33\nDT7)NTG\nDTK)TDB\n3P8)T44\nJL4)76M\n7N5)GPV\nZZ4)9DX\n55B)59F\nD94)4ZY\n5G3)M9W\nDHT)SK7\nTZN)2CD\nQXJ)CNK\nWFB)S42\n7JW)1SK\nX51)CYP\n6DP)PBL\n5BS)LF9\n3NQ)DV2\nY8G)WDJ\n4BW)D1Z\n1GH)BC2\n9H6)7GH\n1XC)6FV\nNZ3)59Q\n8CC)NXM\n9WR)7L1\nDCC)498\nTGQ)85Z\n4H2)4T1\nVSY)L7R\n4ZL)SRV\nPHX)2MY\nT8X)XBQ\nXCY)MCD\n5R2)TF6\nVKS)JWD\n9T9)T17\n8F3)XNT\nDH1)NVN\nVB6)P9S\n7Y6)C84\n3F7)3WJ\n1NY)JQG\nLDS)GXT\n4WP)HNT\nTG1)562\nKJB)TQZ\nD9D)T9H\nXSV)C1M\nX3Z)ZMX\nRXV)HPL\n1BQ)1M4\nHNT)4MP\nPBL)K84\nT97)DT7\n65J)CNR\n7GZ)PCZ\nGHT)ZDF\nL7R)W9Y\nNHT)HX7\nSDZ)MJP\nBV6)374\n13H)M5L\nYXN)XFS\nDCP)1NY\nSV3)33T\n415)B34\n8NL)DS8\nRM5)796\nG1W)RK1\n5CJ)SMH\nJBL)974\nHPL)M3M\nXNB)MB7\nH9D)DQ9\n4JB)6JX\nXR5)B22\nBMK)RR5\nKD3)D7H\n76X)CTC\nTQD)56X\nWZY)84Y\nHSZ)663\nSJZ)NHV\nRSR)7MF\nWB3)537\n62Y)LHR\nH69)26P\n811)167\nK65)7VL\nQ62)3PG\nYZ2)C1C\n56X)VFS\n6WQ)8NF\nDP3)PJF\n62D)NHM\nT44)F8B\nNDB)K1T\nLVH)HFP\n96D)YSP\n2N9)4BM\n89B)246\nT3D)KH1\nY4V)2CX\n6DP)TQ1\n5CM)9TB\nPHX)5NT\n6LW)ZQQ\n7LT)K1R\nHBJ)9L9\nXW6)NNM\nBCX)KB5\n8WG)ZXM";
        $counter = new OrbitCounter();
        $you = OrbitGraphFactory::create($input, 'YOU');

        $this->assertSame(370, $counter->findSanta($you->getOrbits()));
    }
}