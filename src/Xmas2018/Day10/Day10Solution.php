<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2018\Day10;

use Jean85\AdventOfCode\SolutionInterface;

class Day10Solution implements SolutionInterface
{
    /** @var Sky */
    private $sky = [];

    /**
     * Day10Solution constructor.
     *
     * @param Point[] $points
     */
    public function __construct(array $points = null)
    {
        $this->sky = new Sky();

        foreach ($points ?? $this->getDefaultPoints() as $point) {
            $this->sky->addPoint($point);
        }
    }

    public function solve()
    {
        return $this->sky->findTurnWithSmallestArea();
    }

    /**
     * @return Point[]
     */
    private function getDefaultPoints(): array
    {
        return [
            new Point(-30052, -9918, 3, 1),
            new Point(20349, -50260, -2, 5),
            new Point(40505, -40169, -4, 4),
            new Point(30444, 50599, -3, -5),
            new Point(40549, -50259, -4, 5),
            new Point(30454, -30087, -3, 3),
            new Point(50623, 20347, -5, -2),
            new Point(30439, -50262, -3, 5),
            new Point(50623, 40516, -5, -4),
            new Point(-40143, -30090, 4, 3),
            new Point(50594, 50602, -5, -5),
            new Point(-9884, -30087, 1, 3),
            new Point(-19958, -40168, 2, 4),
            new Point(20357, 40513, -2, -4),
            new Point(-50240, 30431, 5, -3),
            new Point(20351, 40516, -2, -4),
            new Point(-50257, -20005, 5, 2),
            new Point(-30073, 10253, 3, -1),
            new Point(-50265, 50597, 5, -5),
            new Point(-40154, 50601, 4, -5),
            new Point(-19987, -40168, 2, 4),
            new Point(-19987, -30087, 2, 3),
            new Point(-50257, 30425, 5, -3),
            new Point(40558, 30425, -4, -3),
            new Point(-19990, 10256, 2, -1),
            new Point(-19979, 30425, 2, -3),
            new Point(-19976, -50254, 2, 5),
            new Point(30446, -40172, -3, 4),
            new Point(-40157, 40515, 4, -4),
            new Point(-40143, 20342, 4, -2),
            new Point(30467, -50255, -3, 5),
            new Point(-30040, 50606, 3, -5),
            new Point(-30037, 50605, 3, -5),
            new Point(20382, -30086, -2, 3),
            new Point(50594, 10262, -5, -1),
            new Point(20342, 40515, -2, -4),
            new Point(-19963, -50258, 2, 5),
            new Point(-40135, 50599, 4, -5),
            new Point(40558, 10262, -4, -1),
            new Point(20366, -40177, -2, 4),
            new Point(-9888, -9919, 1, 1),
            new Point(-19998, 40511, 2, -4),
            new Point(50608, 40516, -5, -4),
            new Point(10263, 40520, -1, -4),
            new Point(40521, -40171, -4, 4),
            new Point(30427, -20005, -3, 2),
            new Point(20333, -9916, -2, 1),
            new Point(-9909, -9913, 1, 1),
            new Point(50628, 40511, -5, -4),
            new Point(50610, 30430, -5, -3),
            new Point(-50248, 30433, 5, -3),
            new Point(50612, 50599, -5, -5),
            new Point(-50253, -40170, 5, 4),
            new Point(-9880, 40513, 1, -4),
            new Point(20362, 10256, -2, -1),
            new Point(-9877, -30087, 1, 3),
            new Point(-40182, -30082, 4, 3),
            new Point(-50240, -20003, 5, 2),
            new Point(-40138, 10255, 4, -1),
            new Point(-50221, 20348, 5, -2),
            new Point(-9896, -9917, 1, 1),
            new Point(-50209, 40516, 5, -4),
            new Point(20352, 50602, -2, -5),
            new Point(50607, -19998, -5, 2),
            new Point(-19995, -30087, 2, 3),
            new Point(-20003, 40517, 2, -4),
            new Point(-50219, 30431, 5, -3),
            new Point(40521, -20001, -4, 2),
            new Point(-30036, 20339, 3, -2),
            new Point(50624, 10257, -5, -1),
            new Point(-50224, 40517, 5, -4),
            new Point(-9907, 20344, 1, -2),
            new Point(40534, -40169, -4, 4),
            new Point(-30065, -20003, 3, 2),
            new Point(-9922, 20339, 1, -2),
            new Point(-30052, 50602, 3, -5),
            new Point(10276, -50263, -1, 5),
            new Point(50594, 10258, -5, -1),
            new Point(-9876, 10258, 1, -1),
            new Point(-20001, -30091, 2, 3),
            new Point(-50253, 50602, 5, -5),
            new Point(-40159, -20002, 4, 2),
            new Point(-50224, -30091, 5, 3),
            new Point(-20001, 40511, 2, -4),
            new Point(20357, -40173, -2, 4),
            new Point(50615, 10255, -5, -1),
            new Point(-9877, -50254, 1, 5),
            new Point(30440, 40516, -3, -4),
            new Point(30427, 50605, -3, -5),
            new Point(30419, -30090, -3, 3),
            new Point(20376, -20001, -2, 2),
            new Point(10255, 20344, -1, -2),
            new Point(30419, 20344, -3, -2),
            new Point(50595, -40169, -5, 4),
            new Point(-30081, 40513, 3, -4),
            new Point(-40143, -30090, 4, 3),
            new Point(40553, 20344, -4, -2),
            new Point(40529, -40170, -4, 4),
            new Point(30427, -50262, -3, 5),
            new Point(-50240, -19996, 5, 2),
            new Point(-50245, -30090, 5, 3),
            new Point(30448, -30087, -3, 3),
            new Point(-9875, -40171, 1, 4),
            new Point(-9900, 50599, 1, -5),
            new Point(-19954, -40168, 2, 4),
            new Point(40526, 40518, -4, -4),
            new Point(-20011, 30428, 2, -3),
            new Point(10283, 10257, -1, -1),
            new Point(-40175, 40520, 4, -4),
            new Point(50636, -9915, -5, 1),
            new Point(-9904, 10255, 1, -1),
            new Point(30435, 40520, -3, -4),
            new Point(30424, -50254, -3, 5),
            new Point(20393, 50602, -2, -5),
            new Point(-50261, -30083, 5, 3),
            new Point(-30065, 10254, 3, -1),
            new Point(-30052, -40177, 3, 4),
            new Point(50625, -50263, -5, 5),
            new Point(-40142, -20001, 4, 2),
            new Point(20338, -19996, -2, 2),
            new Point(50599, 50604, -5, -5),
            new Point(40534, -40176, -4, 4),
            new Point(-50235, 20339, 5, -2),
            new Point(-30068, -9918, 3, 1),
            new Point(-40173, 20339, 4, -2),
            new Point(-30054, -9915, 3, 1),
            new Point(10255, 20348, -1, -2),
            new Point(-40162, 40520, 4, -4),
            new Point(-40158, -9918, 4, 1),
            new Point(40508, 20348, -4, -2),
            new Point(10307, -40177, -1, 4),
            new Point(40545, -50261, -4, 5),
            new Point(-30073, -40172, 3, 4),
            new Point(-50209, -9918, 5, 1),
            new Point(-9913, 40515, 1, -4),
            new Point(-9873, -50262, 1, 5),
            new Point(-9877, 10261, 1, -1),
            new Point(-50245, -30084, 5, 3),
            new Point(30440, 50606, -3, -5),
            new Point(-40167, 40514, 4, -4),
            new Point(-30076, -50255, 3, 5),
            new Point(-9891, -19996, 1, 2),
            new Point(-9877, 20340, 1, -2),
            new Point(20365, -9911, -2, 1),
            new Point(-50256, 10253, 5, -1),
            new Point(-9909, -19996, 1, 2),
            new Point(30479, -9919, -3, 1),
            new Point(-30065, 10257, 3, -1),
            new Point(50652, -9919, -5, 1),
            new Point(20338, -9914, -2, 1),
            new Point(-30062, 20339, 3, -2),
            new Point(20360, 10259, -2, -1),
            new Point(40537, 50604, -4, -5),
            new Point(-50221, 50603, 5, -5),
            new Point(40505, -30090, -4, 3),
            new Point(-9890, 20339, 1, -2),
            new Point(-30097, -50261, 3, 5),
            new Point(-19995, -30086, 2, 3),
            new Point(20341, 10255, -2, -1),
            new Point(-19977, -20005, 2, 2),
            new Point(-30053, -50259, 3, 5),
            new Point(-30065, -40173, 3, 4),
            new Point(50617, 50601, -5, -5),
            new Point(50631, -40171, -5, 4),
            new Point(-9925, -9915, 1, 1),
            new Point(-40150, 10262, 4, -1),
            new Point(40526, 40516, -4, -4),
            new Point(-30055, -9915, 3, 1),
            new Point(-50264, 30432, 5, -3),
            new Point(10287, -20003, -1, 2),
            new Point(40534, 20348, -4, -2),
            new Point(-19960, -19998, 2, 2),
            new Point(30464, -40173, -3, 4),
            new Point(-50220, -50259, 5, 5),
            new Point(40537, -9919, -4, 1),
            new Point(20357, 20346, -2, -2),
            new Point(40510, 50598, -4, -5),
            new Point(50607, -40172, -5, 4),
            new Point(40537, -19996, -4, 2),
            new Point(50636, 10261, -5, -1),
            new Point(-9896, 30425, 1, -3),
            new Point(-9917, 10255, 1, -1),
            new Point(-50248, 50606, 5, -5),
            new Point(-50237, -9919, 5, 1),
            new Point(-30073, -20005, 3, 2),
            new Point(40529, 50606, -4, -5),
            new Point(50650, -30082, -5, 3),
            new Point(-30093, 10258, 3, -1),
            new Point(30456, -40177, -3, 4),
            new Point(40521, -40170, -4, 4),
            new Point(30468, 10257, -3, -1),
            new Point(10276, -50261, -1, 5),
            new Point(30421, -9919, -3, 1),
            new Point(-9877, 20346, 1, -2),
            new Point(10258, -40177, -1, 4),
            new Point(-50264, 40516, 5, -4),
            new Point(-9883, -40173, 1, 4),
            new Point(-40127, -50256, 4, 5),
            new Point(-9885, 20343, 1, -2),
            new Point(20382, -9914, -2, 1),
            new Point(-30076, -19998, 3, 2),
            new Point(-30073, 50601, 3, -5),
            new Point(-9893, 20345, 1, -2),
            new Point(-9904, 10258, 1, -1),
            new Point(20393, -40171, -2, 4),
            new Point(-19984, 50603, 2, -5),
            new Point(-9889, 20343, 1, -2),
            new Point(-19982, 40512, 2, -4),
            new Point(-20009, -40168, 2, 4),
            new Point(-30069, -19997, 3, 2),
            new Point(-19987, -30085, 2, 3),
            new Point(10252, 10259, -1, -1),
            new Point(-9917, 30428, 1, -3),
            new Point(10287, 20342, -1, -2),
            new Point(-50245, -20000, 5, 2),
            new Point(-40165, -40177, 4, 4),
            new Point(-40135, -50262, 4, 5),
            new Point(-19984, -30085, 2, 3),
            new Point(30428, -30091, -3, 3),
            new Point(-30089, 30431, 3, -3),
            new Point(30467, 20344, -3, -2),
            new Point(-19987, 40520, 2, -4),
            new Point(-30037, 40512, 3, -4),
            new Point(40557, -50255, -4, 5),
            new Point(40550, 10254, -4, -1),
            new Point(-40159, 10258, 4, -1),
            new Point(40539, 20343, -4, -2),
            new Point(30440, 50605, -3, -5),
            new Point(30453, 30434, -3, -3),
            new Point(40550, -30088, -4, 3),
            new Point(-40151, 10256, 4, -1),
            new Point(10276, 40514, -1, -4),
            new Point(10280, 20348, -1, -2),
            new Point(-20009, -30091, 2, 3),
            new Point(30467, 50601, -3, -5),
            new Point(30439, -20000, -3, 2),
            new Point(10276, -20005, -1, 2),
            new Point(40562, -30082, -4, 3),
            new Point(-19986, -20004, 2, 2),
            new Point(20333, 10259, -2, -1),
            new Point(-50224, -9911, 5, 1),
            new Point(-9872, -9919, 1, 1),
            new Point(10295, -30085, -1, 3),
            new Point(-19990, 30429, 2, -3),
            new Point(10295, -30084, -1, 3),
            new Point(30429, 40515, -3, -4),
            new Point(20365, -30086, -2, 3),
            new Point(50618, 10258, -5, -1),
            new Point(-20010, -9910, 2, 1),
            new Point(20373, -40169, -2, 4),
            new Point(10307, -50261, -1, 5),
            new Point(20381, 10256, -2, -1),
            new Point(40513, 40517, -4, -4),
            new Point(-9865, 20345, 1, -2),
            new Point(-9909, 20347, 1, -2),
            new Point(10284, 20348, -1, -2),
            new Point(-30073, 20342, 3, -2),
            new Point(-30078, 30425, 3, -3),
            new Point(-9899, 20342, 1, -2),
            new Point(20333, 30429, -2, -3),
            new Point(10306, 10253, -1, -1),
            new Point(-50261, 10260, 5, -1),
            new Point(30459, -9912, -3, 1),
            new Point(10292, -40176, -1, 4),
            new Point(20389, -30083, -2, 3),
            new Point(-40166, 20340, 4, -2),
            new Point(-9901, 20345, 1, -2),
            new Point(40557, -20004, -4, 2),
            new Point(-40158, -30090, 4, 3),
            new Point(-50209, 10255, 5, -1),
            new Point(-50265, -40172, 5, 4),
            new Point(-50245, 50605, 5, -5),
            new Point(30443, -40177, -3, 4),
            new Point(-9916, 20339, 1, -2),
            new Point(50640, 50601, -5, -5),
            new Point(-19971, -20005, 2, 2),
            new Point(40522, -9914, -4, 1),
            new Point(50607, -19999, -5, 2),
            new Point(-50243, 40515, 5, -4),
            new Point(-50240, 10260, 5, -1),
            new Point(40561, -19998, -4, 2),
            new Point(-50211, -50254, 5, 5),
            new Point(-40143, 30431, 4, -3),
            new Point(30430, -50259, -3, 5),
            new Point(30479, -20002, -3, 2),
            new Point(-30092, 20344, 3, -2),
            new Point(-30092, -40168, 3, 4),
            new Point(50601, 10257, -5, -1),
            new Point(20373, 40515, -2, -4),
            new Point(30479, -19997, -3, 2),
            new Point(-40175, 50605, 4, -5),
            new Point(-9880, -40173, 1, 4),
            new Point(20349, -50255, -2, 5),
            new Point(20362, -9914, -2, 1),
            new Point(-30089, 50601, 3, -5),
            new Point(30467, 10253, -3, -1),
            new Point(40565, 30429, -4, -3),
            new Point(-40142, 10257, 4, -1),
            new Point(50609, -50263, -5, 5),
            new Point(-9881, -40173, 1, 4),
            new Point(50639, 40515, -5, -4),
            new Point(-50269, -40170, 5, 4),
            new Point(40553, -9910, -4, 1),
            new Point(30455, 30434, -3, -3),
            new Point(20362, 10258, -2, -1),
            new Point(40505, 50603, -4, -5),
            new Point(-19990, 10260, 2, -1),
            new Point(30447, -19998, -3, 2),
            new Point(-40150, -30087, 4, 3),
            new Point(-9907, -40172, 1, 4),
            new Point(-30044, 20348, 3, -2),
            new Point(-40178, -9913, 4, 1),
            new Point(-50261, 30428, 5, -3),
            new Point(-40151, 20348, 4, -2),
            new Point(-50224, 30432, 5, -3),
            new Point(50652, -50263, -5, 5),
            new Point(-19952, 50606, 2, -5),
            new Point(30431, 40511, -3, -4),
            new Point(30459, -30088, -3, 3),
            new Point(50651, 20347, -5, -2),
            new Point(10292, -30082, -1, 3),
            new Point(20366, 10257, -2, -1),
            new Point(-19987, -9913, 2, 1),
            new Point(-9865, -40170, 1, 4),
            new Point(-9889, 50597, 1, -5),
            new Point(-30065, -50262, 3, 5),
            new Point(-9921, 20347, 1, -2),
            new Point(-30084, 10253, 3, -1),
            new Point(10248, -20005, -1, 2),
            new Point(20345, -9915, -2, 1),
            new Point(-9882, -9915, 1, 1),
            new Point(-30065, 50602, 3, -5),
            new Point(40565, 50599, -4, -5),
            new Point(20349, -50261, -2, 5),
            new Point(-19960, -19998, 2, 2),
            new Point(10255, -50258, -1, 5),
            new Point(-9901, -50255, 1, 5),
            new Point(-50219, -9916, 5, 1),
            new Point(40524, -30086, -4, 3),
            new Point(40550, 50600, -4, -5),
            new Point(-50233, -30091, 5, 3),
            new Point(30440, -50257, -3, 5),
            new Point(-9920, 50605, 1, -5),
            new Point(40507, 20339, -4, -2),
            new Point(10264, 30426, -1, -3),
            new Point(40556, 20341, -4, -2),
            new Point(-9875, -9913, 1, 1),
            new Point(-30068, -50254, 3, 5),
            new Point(-9889, 30425, 1, -3),
            new Point(-20011, -40172, 2, 4),
            new Point(-50269, 10259, 5, -1),
            new Point(-40132, 30432, 4, -3),
            new Point(40553, -9913, -4, 1),
            new Point(-30073, 10256, 3, -1),
            new Point(-30092, 20340, 3, -2),
            new Point(40542, 50606, -4, -5),
            new Point(-50224, 20347, 5, -2),
            new Point(-40143, 50606, 4, -5),
            new Point(-19971, -20000, 2, 2),
            new Point(40553, 20340, -4, -2),
            new Point(-30081, -20001, 3, 2),
            new Point(-30037, -40172, 3, 4),
            new Point(-9865, 30428, 1, -3),
            new Point(30479, 20340, -3, -2),
            new Point(30429, 20343, -3, -2),
            new Point(-19971, -40172, 2, 4),
            new Point(30431, 50601, -3, -5),
            new Point(-19982, 10256, 2, -1),
            new Point(20344, 20343, -2, -2),
        ];
    }
}
