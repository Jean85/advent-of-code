<?php

declare(strict_types=1);

namespace Jean85\AdventOfCode\Xmas2018\Day20;

use Jean85\AdventOfCode\SolutionInterface;

class Day20Solution implements SolutionInterface
{
    private const INPUT = '^ESWSESENENNW(S|NWWWWWSEESSSWWNENWWWWNWNWSSWSESSSWSESWSSWNNWWSSE(SWSSEEN(W|ESESWSESWSEENESENNENNWWS(E|W(SEWN|)NNEEENNNNWWW(NNESEENWNE(EESSENNE(N|EESSWSESWSESSSEEENNENENWWWS(E|W(SSENSWNN|)NNNNNNEENWNENENNWNWSW(SE(S|E)|WWWNEENE(NENNWWS(SWSWNNENNWWNWWWSWNNNWSWNNWWSESWWWSSESENEEN(ESSWSSWN(N|WWWNWNNNWWSESSWNWSWSEESWWSSWNNNNNENWWWSWSWWWSWSSEESSENNNN(WSWENE|)ESESSSSW(NNN|SWSSSWSESSSSWWSSESESEESESSWNWNWWWWNE(E|NWNWWNNEE(SWEN|)NENWWWNENNNENWNNNN(NWNNWNWNNWWWWWSWNWWNNENWNWNEENWNENNENNWSWNNENWNWNNWSSWSESSWSESWWWWWNENENE(SSWENN|)(NNWNNNENEES(WSSWNSENNE|)EESEEENNENESESESWSWNNWSSSESESENN(W|NENENNNESESSSSENESESESWWNWWSWNNW(NENNSSWS|)WSESSW(SSESEESEENNEEENN(WSWWN(E|W(SWS(ESNW|)WN(NEWS|)W|N))|ESESEESESSWSWNWSWNNN(WSSWW(NNESNWSS|)SWSSSWSESES(WWNWWW(SEES(W|E|SS)|NNNWSSWNNWWNNNENWNNWNEESSE(SSSWSEENENN(ESESWS(SSE(SWEN|)NEN(NNEWSS|)W|W)|W(S|N))|NNNWWWW(SSSWSESWSEE(SWSSE(N|ES(ENSW|)WWW(NNNWESSS|)W)|NNN)|NWNE(ESEWNW|)NNWW(SEWN|)W)))|ENNWNNEEN(EEEEESES(EENESENNNWNENEEESWWSSENEEEEESESESWS(EEENNW(NENENNEESEENWNWWWNWNNNEEEENWWWWNEEEENNWSWWWWWNNWSWWWWSSSESWSWWSSS(WNNNWSWSS(ENSW|)WS(E|SWSW(W|NNENWNNNWNWWNEEENNNEESWSESSW(W|SE(SWSEWNEN|)ENENENEE(NNWSWNNNNESSENNNEENNWWS(WSWWNWNENEE(SWSNEN|)NNWWNNENEEESWWS(EEESENENNENESENNWWWNNNEESES(WWNSEE|)EEEENWWWNNNEESWSEENENNEENENWNEENWWNNEES(W|EEN(ESSWWSSESENN(EESESSWSSSSENENN(WSNE|)NENNW(S|NENESSSEESSSSWWNENW(NEWS|)WSSSEEEENNENEENNENNESSESWSEESWWSWWN(ENNSSW|)WSSEESSENEEESWSSSWSEENENN(WSNE|)ESEENESENENWWWW(NWSWNNWWW(NEEEENWNW(NEENENNNNWSWSESWWS(W(S|NWNEENNN(WWSWNWWSS(WSESWSWS(W(NNWWNNEES(E(S|NNWN(EESNWW|)WSWWN(E|WWS(WS(WWNNE(E|S)|S|E)|E)))|W)|S)|E)|E(EEENSWWW|)N)|E(EEEEESWWSSESESSSSSEESS(ESSW(N|SEEENWNNNENNNESSENENWNNENWNEESSS(W|SESSSSSSWNWNENN(WSWWSWSESSEN(NN|ESESSWWWWWN(EEEE|WSWNW(WWWSSWNW(NEWS|)SSWWWWN(EEENSWWW|)WSWSESWSWNNNNENENNN(WWNWWSESSWSWSWWWWNWSWWWNNNESSENENNW(NN(E(EEEESSSS(WS(WNWNEENWN(E|W(W|S))|E)|EN(E|NNNE(EE|NN)))|N)|WWNNWSWWNENENWWWW(NEE(NWNSES|)EEE(N(E|N)|SS)|SE(SSSEESE(S(ENESNWSW|)SWWSWWWSSWNWWSSE(N|SWSWWWWSSWWSS(EEN(W|EENEEEN(WWWWSNEEEE|)NESENEENNESSSWWSSESWWNNWSSS(WWNN(ESNW|)WSWWSEESWWWN(SEEENWESWWWN|)|SSSESWSSENESENESESSESWWNNWSSWW(SESEEEEEN(NNNWNNENNESEEEEESEESWSEENESSSWSSESEEEESSSESEENWNNNW(NEENEESSSESWW(WNEN(W|N)|SESENEEENWNENWW(WNNNNNNNENNWWNWWNENNEEESESWS(WNNWSNESSE|)ESSSSWSEESESSS(ENENEENNEEENESSSSSEESSSSWNWNWN(EESNWW|)WSSESSE(SSSSWWSEESESWWWN(E|WNWSWWNENEENEENWN(WNWNE(ESNW|)NNWWS(WWW(SSWWWSSSWWWNEN(ESNW|)W(WWSWWN(WWSSSESSESENESSESWWWSSEESSESENNNENW(W(SS|WW)|NNNEESS(WNSE|)SSSSEEESWWSSSSEEENNN(WWSESW|NNNWWWNEEENENENN(WNNNNNWSSSSSWNWW(SESSW(SEENEN(W|E)|N)|WWNWW(S(S|E)|WWWNEN(WWNSEE|)ESE(NN|EEEEES(WW|ENNNN(WSSNNE|)EENNEESSES(WW(NN|S(EE|S))|E)))))|EEESSESWSWWN(ENWNEWSESW|)WSSEESSWWN(W(SSESSW(SSWSWNWWWNNWWWNWWNWSWNWSWSEEEESSWSSEEN(W|EEE(NNWWS(WNNSSE|)E|EESSESWWNNWSWNWSSSWWSSWWNENWWWSWWNENNNESSEEN(NNNN(E|WWSWS(WNWNWNEEE(SWEN|)NNNNWWWWNNESENNWNNNENEESSSSSS(EENWNNNNE(NWN(WWWNWNNESEENWNWNEESE(SSSWWEENNN|)NNNWWWNN(NWNNN(E(SS|E)|WWWWSSSSEESWWWNNW(SSWNWWWWWW(N|WSEEEEESE(SENESENEEEEE(S(WWWWSEEES(ENSW|)SSSWSWWSEEE(ENWESW|)SSSWWSWNNWWSWWNNE(NENNE(NNN(WN(WWWWWWSESSESWWNNWWNNE(S|NN(ESEE(NWES|)E|WWS(E|SSS(WNWNNNE(NW(WSSSS(SEWN|)WW|N(EESNWW|)N)|SS)|SESSW(N|S(ESESESESEE(EEESWSSSEENN(WSNE|)N(EEE(NEWS|)SSSWSSWSWNN(ENNENW|WSSWWNN(ESNW|)WWSSSSWW(SWSSENESENN(W|ESESSW(N|SSWNWWSESWSWSSWNNNWSWSWNWNWNNWWSSSSEN(ESESWSWNWSWSSSEEENN(WSWNSENE|)EESESSESSESESENNNW(S|NW(NNEES(W|ENNWN(NNEEESWWSESSEEESSESSESEEENWNNWS(S|WNNEENNWWNWWS(ES(S|EE)|WWNENEENNNEESWSES(EEEESSSEEENENNNWSWS(SWNNNNN(ES(S|ENESE(EESSESSSSSWWNNE(NNWSW(NNNESNWSSS|)SWSSSE(EEEESSSWSESWWWNNWSWNNWSSWNWSWNW(WSSE(SENEESENESE(SWWWW(N|WSSSENNESESEENEESWSESWSWNWWWN(WSWWN(NNNWWWSEESSWSSSSSEEESWSSEEN(W|EENENENN(WNWWSES(WW(NNWWW(SES(ENSW|)W|N)|SE(SWEN|)E)|E)|EESEENNW(NENNW(S|NNESENNN(NNEENWNW(S|NNNWNEESSES(ES(ENNENNNEENNNESSSSWWSEESWWSEESEESWSSSENNENEENEEESSENNNNESSSSSWWWSEEESSSSEE(NWNENWNENNNNNW(SSSS|NNWNENWNWNWWNENWNENWWSWSWNNWWNNNNNNNENEESEESSENEEESE(SSWWWSWNWSS(WW(S|NWSWNNENWNEN(EESWSE(EEEE(NWES|)E|S(W|S))|N|W))|EEESWSEEE(NWNN(ESNW|)W|SWWS(WNSE|)ES(E(S(SSSS|W)|N)|W)))|NNWWNWW(SEWN|)NNNNWSWWNNW(NEEENW(W|NEENESSESWW(S(WWSNEE|)EESSSEE(NNNW(NNNNW(S|NW(NNESESE(SSSS|NNNNWS(S|WNNENE(NNWNW(SS(E|WS(W(NNEWSS|)SSSENN|E))|NNENE(SS(S|W)|NWNNNWNWSW(NNNNNWNENWWSSSS(ENSW|)WSWNWSWWNENNWWS(SSW(WNNNE(SS|NENESEENWNEEE(SWSSE(SWWNSEEN|)N|NWWNENWNEESEEEESEESSWSSW(SEEE(NN(WSNE|)NNNNWNENNNWSWWWWWWNEEN(WWWWSESWWS(EEEEEES(WW|ENE(E|SS))|SWSESWWNWNNE(S|NNE(ENWWWSSWWWN(NEN(ESSWENNW|)W|WWSESSEESS(WWWWWSSWNWNWNENW(NNEES(W|EE(NWES|)SS(WNWSSNNESE|)E(EE|NN))|WSWWSSSWSSWSESW(SEESESWSSESEE(NWN(NNENEENN(NWN(E|NWWN(E|W(NEWS|)SSSSW(SEE(SWEN|)EN(NNWSS|ES)|NN)))|EESE(SSSSWWNN(WWSWSESSEN(EEE|NN)|E(NWNSES|)S)|E))|W)|SWWWNW)|WWNNWNNWWWSEESWS(WWN(E|WWWNENNWSWW(NNE(ENW(WW|NEENNEEN(EEEESWSEEEESE(NNNW(SWNWSNESEN|)NENENNES(NWSSWSNENNES|)|SSSWSWW(SE(E|SS)|NENN(ESNW|)NWSWWN(E|WNW(NEWS|)WWSSWSEENE(NWES|)SS(EN(EE(SWEN|)E|N)|WSSWNN))))|WWWW(SESWENWN|)NN(NESSNNWS|)WWS(W(N|SSWNWS)|E)))|S)|SWWW(NEEWWS|)SEESES(WWNSEE|)E(S|N(ESNW|)N(N|W))))|EE)))|SEN(NNNWWEESSS|)ESS(WS(E|S)|ENE(S|E))))|SS)))|ESENE(EENNNNWWWW(SEESWWW(N|SEEEENN(SSWWWWEEEENN|))|NNNNENWNEENEE(NWNNNE(SS|NNWSWNWWSESWW(SEEE(N|SWS(E|WS(WNNEWSSE|)E))|NNWWSS(ENSW|)WWSSWWSWNWNNESEENWNEN(ESENSWNW|)WWSWNWSSW(W|SESSSSSEENWN(N|EE(SSSWS|EENW)))))|SSSWW(NENSWS|)SWSEEE(SWWW|NW)))|S))|SWSWNWSSEESE(NN|SSS))|NNWN(EE|NWSSWNNW(ESSENNSSWNNW|)))))|SES(EENWESWW|)S)|E)|SES(W|E(N|SS)))))|S)))|WWW(SEWN|)W))|SS)|SSWNWWNNN(SSSEESNWWNNN|))|N))|SSWWSEEES(WWWSWSSWSESWSSWNW(NN(ES|WN)|SSSWNNWSWWW(NNESEWNWSS|)SWNWSSWSEESWSEESS(WNWSNESE|)EESE(NNWWNENNNE(EES(EENNW(NEE(NN|SSSSENE(NWES|)SEEE(N|SSESE(N|SE(N|SWSWWWWNWSS(E(SWEN|)EEEE|WNNNW(NNEN(W|EESSW(N|W|SEEE(NWNNSSES|)S(ENSW|)W))|SSS))))))|S)|SWNWSSESEN(SWNWNNSSESEN|))|NWWSSSWNNW(ESSENNSSWNNW|))|SW(WNSE|)S))|ENESSW))))|SSSSSSWSWWSSENESE(SWWSEESWS(WWN(NWWSWS(EENSWW|)WWNWSWNWNWNWNNENWNEEESENNNWSWNNNWSSWWS(SSWWNENWNWSSWSWSSWNWNWSSESWWWNENWN(EN(WNSE|)EEE(S|ENNE(S|NEEE(S|NNEE(SWSEWNEN|)EENWWWNWWWWSSS(ENE(S|N(W|E))|WNW(SS(SS|E)|NENNEENNN(WWSESW|NEEENW(N(N|EESSSSSE(EEESWS(WNWSWNWWWNENE(NWWSNEES|)S|SEESWSW(SEEESESWW(SSSESWWSS(WNWN(W|EN(WNSE|)E)|ENEE(SWSNEN|)NNENWWNEENEEE(SWWSSSS(WNSE|)E|NWWNW(NEEEN(ESS(SS|WW)|WWWWS(S|W(W|NNEEEENNWSWWWW(NENE(SENEEWWSWN|)NNN(NESNWS|)WWSS(EN|WN|S)|W))))|S)))|N)|N))|NNNN))|WW)))))))|WSSW(N|SESSS(ENNESSENEEN(NEEENWNE(N|EEESSWSSS(EEE(NWWNEWSEES|)E|WNN(NNEWSS|)WSWS(E|W(NNEWSS|)WW)))|WW)|WNNWNW(NEWS|)SSWWS(EEENSWWW|)WNWSWWNWNWSWWS(EEE|WNWNENWWNENNWWNENWWWNNNEEESWWSEEESEENENNEESSE(NNNWWWWNNESEE(NNW(S|NENNWNWWNEN(ESESEE(NWES|)SSS(WNNSSE|)E(E|N)|WNWSSWSSSWSSWNNWSSWWWNWNENNWSWWWWNWWSESSSESESEENN(W(S|WNEENWWWS(NEEESWENWWWS|))|ESEESS(SWSESSWNWWNNN(WWWSESSSWWNWSSSSWWWWNNWSWWSESE(ESSWSS(WNWWNNN(ESE(SWEN|)E|NNNEENNWNWSWNWNENNESENENWNENEESESSSESSE(SSSSWNNW(SS|WWNEE(NWWWN(WW|NENN(N|ESSS(E|W)))|E))|ENNE(SSESNWNN|)N(E|WN(E|WW(SESSNNWN|)NNNE(ESSWNSENNW|)NWNNWWNNNNWNNNWNNENN(ESSENNEESEE(NWNENNNNNESSEE(ESSESENENWN(WSNE|)EE(E(SWSESNWNEN|)EEE|NN)|NNW(S|N(WNENWN(ENNEWSSW|)WW(NN|SESWS(SSSSSWS(NENNNNSSSSWS|)|E))|E)))|SWSSWSWWS(WNNEN(WW|E(S|N(ESNW|)N))|SENEE(N|SEESWSSEEENENN(WWS(SWEN|)E|E(NWNSES|)SESSW(WS(WS(WNWWWNW(SS|WNN(WSSNNE|)E(SENSWN|)N)|E)|EEE(SSE(SSWNSENN|)EEN(WWNSEE|)E(S|NNNE(S|NWN(W|EESE(ES|NNWW))))|N))|N)))))|WWS(E|WNWWSESWWNWSWNWNWSSESWSSSWNNNNNNWSSSSWWNENNNWWWNENEE(NWWWSWSSWNNNNE(NNWWWNWSWNNNNEEE(SWWSEES(NWWNEEWWSEES|)|EE|NWNENNE(NNNNNWSWNWSSWSESSE(NENWNE|SWWSS(ENSW|)WWSWSWNWWSWSEE(SESSENESE(NNNW(NENSWS|)W(SEWN|)W|ESSWWN(E|WSWNWWSSSESSENNN(WNSE|)EESWSSESSESSWSWNWNWSWSEESWWSEESSWWWWWSWWNNNNNNWNEEENENWNNESEE(NWNWNWNWWWSEES(WSESSSWNWSWWNENWNEN(ESSEWNNW|)NNNNNWWSWNWSWSW(NNENNNW(SS|NNENNW(NNNNESESENNNNWWNENNNNWSSSW(SSSEES|NNNNNNENNNW(SS|NEEEEESSWSEEENEENNNWSWW(S(S|EE)|NNN(WSWWS(WNNWSW(SEWN|)NNENWNEEENWNWNEEEESW(W|SES(SW(WS(WNSE|)E(SWEN|)E|N)|ENNNNNE(SSS(E|S)|NNWWNNNNNWWNENNEENESSSSESWSW(SSENENESS(WSNE|)ENEENENWNWSW(SEWN|)NNW(SS|WNENNW(NNNNWNWSWWNWSSWNNNNWNENNENENWNNEEEEN(WWWWWSWSESSWNW(NNNEWSSS|)SSS(ENSW|)SSSSSE(SWSEEESES(ENEENNWSWWNE(WSEENEWSWWNE|)|WSWS(E|WSSW(NNNENWNEES(NWWSESNWNEES|)|SSSSSESSS(ENESENE(N(E|WWNNE(S|NNWWS(S(SS|WNNNE(EE|NN))|E)))|S)|W(SSSEWNNN|)NN))))|NN)|EESSSESWWSSSSS(SESSSEEESESENNEEEESWSSSSSEEENESSSWWWWS(WWW(SS(WN(W(W|S)|N)|E(SW|NE))|NNENNWNEE(SSS(SWEN|)EEEE|NNW(NEWS|)SWWSS(SEWN|)WNNNWNW(SSES(S|W)|W)))|EEES(SE(NNENNNNESSSENESEENWNWWNEENESSEENESSSWSESWWWSSS(WWNNE(NN(EENNEWSSWW|)WW(SEWN|)W|S)|SENEEEEEE(NWWWN(ENWNENNW(S|NEENWWNNWWW(WWWWS(WWNNWNENESEEEES(WWWWSNEEEE|)ENENWNENNNWNENWWNWSSSE(N|SS(ENSW|)SWWW(SEEEWWWN|)WNNWNNEENWWNWWSESSSSS(ENSW|)WW(SSSE(NNEWSS|)SS(ENSW|)WW(SEWN|)N(N|E)|WNNNWWWSWWSWS(WNNENNNNNW(NENWNNN(WSSNNE|)ESSEENN(WSNE|)EESSESWW(NN|SEESSSES(E(NNNW(NENESSEEESENNWNNEENEN(WWWWWWWSEEE(EE|SW(SESWENWN|)WWW(NWNEWSES|)S)|EEESWWSSW(N|W(W|SS(ENESENENESSS(W(N|W)|SESSW(SSSENNENEENWWNNWNNEES(SSEEEENENWNEENWNENESENN(EESSENNESESWSWWSESENENEENWNEN(WW|ESSEESWWSEESWWS(EEENE(NESENNNNNWWWWWSEEESE(N|SWW(N|S))|SS)|SWS(ESNW|)WWNN(NES(ENNWESSW|)S|WWWWWSSWSEENESESSSWWWNN(ESENSWNW|)WSWWWSWNWN(WWSSSESWWWS(W(W|NNEENN)|EESENESSENNNN(W(NWNSES|)S|EES(ENE(NWWEES|)EEEEE(SWSEWNEN|)(E|NNNNNNW(S|WW))|WSSSSE(EE|NNN|SWSSSWWSWS(EENESS(ENN(N|ESSSSSW(S|NN))|WW)|WNNENN(WSNE|)NEE(SWSEWNEN|)NWWNWWN(SEESEEWWNWWN|))))))|ENWNEESEE(SWWEEN|)NN(WSNE|)ENN(WSNE|)EE(E|NN(WWSEWNEE|)NN)))))|WWWSWWN(WSWWWN(EE|WSW(N|S(WWSNEE|)ESEEN(W|ESSSSEENNW(NEN(ESNW|)W|S))))|E))|W)|N))|SSSSSESWWNNW(ESSEENSWWNNW|)))))|S)|SSE(SWEN|)NN)|WWWNENNWWW(NNESNWSS|)SE(SSW(SEWN|)N|E)))|SWNWSSESWSE(ENNSSW|)SSS)|E(S|ENEENESSWW(EENNWSNESSWW|)))))|E)|S(EE|S)))|WWS(WNSE|)E)|SWS(E|WNWSWNWS(SSENESSESE(ESNW|)N|W))))|S)|W))|WWW(S|NWSWNNEEEE(SWEN|)NNNWSW(S(W(W|N)|E)|NNEN(ESENNSSWNW|)WW))))|S))|NNNWNE))))|EE)|EEES(WWSNEE|)ENEE(SSW(SSSW(SEE(N|SWSWSSENE(N|ESWSEEN(ESSENNENESSEE(NNWSNESS|)SWWSW(SWSWSWWWSSWWNWWNEEE(S|NNNN(WN(WNNNN(E|W(NEWS|)SSWSESSESSS(ENNSSW|)WNNWNNWWNENWNN(ESENSWNW|)WWNW(NNE(E|S)|SSS(WNSE|)EE(NWES|)SSW(N|SEEESSESSSWSSSENESEN(NWWEES|)ESENESESSS(WWWWWNN(ESENEESW(ENWWSWENEESW|)|WWSSWNWNENNNW(NENENWNNWWSESS(NNWNEEWWSESS|)|SSWW(WNSE|)SSE(N|SWS(EE(N|SENEE(SSW(N|S(WWN(WSWNNE|E)|ESSES(W|EENNNNWSW(SESNWN|)NNEN(ESE(NEWS|)SSSSE(EENWWNE(WSEESWENWWNE|)|SS(WNSE|)S)|W))))|NN))|W))))|EEENEENWNEENWNWWWWN(WSSESENE(SSWSWN|E)|EEEENW(NENE(NESENN(ESSEWNNW|)N|SS)|W))))))|E)|ESSSENNE(NWES|)E(SWSNEN|)E))|NN)|N)))|NNN)|N)|ENWNNNN(SSSSESNWNNNN|))))))|S))|SESWSEENNEN(W|EE(SSW(N|S(E|SW(NN|SESSWSSSWWSESSENESESWSWSWSEEEN(EN(W|NNE(NWNENWWNW(NEESNWWS|)SS(ESNW|)W|SSSESEESWSESSENNENNW(S|N(NEEEEESEENNW(NW(S|NEN(W|ENENENWNEENWNWW(SEWN|)N(ENN(WSNE|)ESSENE(SS(ESSESESE(NNNN(ESNW|)WS(WNSE|)S|SSESWWSSWNNNENWNWNW(NN|WSESESSWNWW(NEWS|)WSS(WNSE|)SENNESESSW(WWSSSSENNNEEESSSSWNW(NNESNWSS|)SSSSESWSWWWSEESSESSEENESSSSSS(ENNEESEENWNEESENNENWWSWWWNEENNESENESENEENE(E(SWSWSW(WSSWSSWWS(WWWWNSEEEE|)EEEEEEE(NWNNE(NW(NENSWS|)WSSW(WSEEWWNE|)NN|S)|EE)|N)|EE)|NWNWNNNNWSSSWNNWNWWSSWNNNENNNWNNWSSWWNEN(NNESEEEEESSWW(WNEEWWSE|)SSEEEENENEEEENWWWNNNENNWWS(E|WWW(NNEN(W|NESENEEESS(WW(WWSW|NE)|E(NNNWESSS|)SWSESSS(WWNENSWSEE|)ESE(SSS(WWWN(EENSWW|)WWSSE(N|E(SWS(WNW(SSS(ENSW|)S|WWN(EENSWW|)WS(WNWSNESE|)S)|E)|E))|EE(NNWSNESS|)S)|NNNW(S|NNN))))|SS(WNNWWW(NWNEES|SES(ENSW|)W)|ENEESWSWSE(SWSWW|EN))))|WW(WNNSSE|)SSSSSSSW(WNEWSE|)SESSSENNENWNEE(NNWNEN(ESNW|)WWSSSE|SSSESWSE(SSWNWSSW(NNWN(EENNSSWW|)WW(WNEEN(N|W)|S(E|S))|SSE(E|N))|ENENN(E(NWNSES|)SSS(W|EEENWNWS(NESESWENWNWS|))|W(S|W))))))|WWWNEENNNWWSESWWSWNNNWNNWSWNWWWWNWSWWWSESESWSESES(ENEES(W|ENNENN(WWWSS(ENEWSW|)WWNNN(E(SS|EEE)|W)|ESSSE(S(WWNSEE|)EE|NN)))|WWWWWWWNENWWSWS(E|WWNENENNNWSSW(NNNNNENNW(NNNEENEEESENESEE(SSSWNWN(E|WSSSE(SES(EENN(W(S|W)|NESES(ENEENWWWNWNEN(WWSSNNEE|)EENNEESSSW(NN|WWSEEESE(SWSWWS(EEENESE(SES(SS|W)|N)|W)|NEEENNWNENWWW(SSSE(NN|E)|NNWSWNWW(S(SSWNSENN|)E|NN(EES(EEESSNNWWW|)W|W)))))|W))|WWNWSWNNNWW(NEEE(NWW(NE|WWS)|SS)|SSSWSEE(NNN|EESSS(EESWSEE(NNNWWNENW(ESWSEEWWNENW|)|E)|WNNWSS))))|N))|NNW(WWNWSWWNEN(WWWNW(SSSSENNES(NWSSWNSENNES|)|NENN(W(S|NENWNNNNNNNNEESS(W(SSSENN|N)|E))|E(E|S)))|EEE(ESW|NW))|S))|S)|S))))|N)))|W)|NNNN(E|WWSSE(N|S)))|W)))|S)|WW))))|W))))|N)))|E)|SEES(E(SEWN|)N|WWSW(NN|SW(SESSWS(WW(NEN(WNNESNWSSE|)E|S)|EEE)|N))))))|N))|S))|S)|S(W|E(EEEENEEEENWWWNNEE(S(EESE(N|SSW(WWWWS(E|W)|N))|W)|NWWWNNEEE(SWWEEN|)NWWWWSSWWS(WNWN(EENE(S|NEEEEENNNNWWSESSWWN(WWWS(W(NNENESEENNW(WNN(WSWS(S|E)|NN(ESENENEEN(WW|NE(NWES|)SENESSWWSWSW(N|SSENENENESE(NNEEEN(WWWNSEEE|)NNEEEN(WW|NESSSE(NNEWSS|)SWWWN(WSSEES(ENESNWSW|)WWS(SEN|WNWW)|E))|SWSSSESWWSW(SEENSWWN|)NNN(WWWNN(WWSEWNEE|)N|NE(SS|N)))))|NNNNN(WSNE|)N))|S)|S(S|E))|EE)|E))|W)|ESE(ESSW(S|N)|N)))|N)))))))))|ENESENNEESEES(WWWNSEEE|)EEEEEEENWWNWWWS(EE|WNWNW(N(WWS(WW(NEWS|)S|E)|NNEEN(EEE(NWWNNN|EEEESWWSWNWWWSESWS(WNNWSNESSE|)EEEN(WNSE|)ESENESE(SESS(WWN(NWWEES|)E|E)|NN(E|WW)))|WW))|S)))|N)|E(NESNWS|)SS)|ENNESSENEES(E(SS(S|EN|WN)|NNW(WW|NNESENE(S|N(E|WWN(EE|N)))))|W)))))|EE)|SWSWN(WSSSWNW(N(W|E)|SSEEEES(WWSWNSENEE|)ENNWN(WSNE|)E(N|EESSSW(NN|S(EEEN(ESNW|)W|S|W))))|NN))))))|EE)|E)|E)|NN))|W)|W))|WSWWW(NEEWWS|)S(WW(S|W)|E)))|S|W)))|E)|EEE|N))|N)|N)|NEEENNE(NWN(WWWW(NENNW(S|WW)|SSENEESWS(W|E))|E)|SEEEES(ENSW|)(WW|SS)))|NN)|S)|NN))|NNWNWSWSSW(SSEEN(NE(NWES|)SS|W)|NWNENNNWSSWNWNW(NWNEN(EESS(WNSE|)(ENEN(EE(NNN(WSSWENNE|)NESEE(NW|SWW)|SESWW(N|W|SEES(WWSNEE|)EE(SW|NWN)))|W)|S)|WW(S|NN))|SSSE(ESWWW(N|SWS(W(W|N)|EE(SWEN|)N))|N))))|E)|W)))|WWWW(SE(SS|EE)|N(EN|WSW))))|S))|NN)))|NENNNWSSWNWSWNW(NNEENNEN(N(N|ESESWSWS(SWWEEN|)EENENNESSE(SWWEEN|)NN)|W)|S)))|NN)|NNNWNEN(WWWS(WNNNSSSE|)SE(SESNWN|)N|NNNWNEESSSE(NENWN|SWS)))|W))))))|E)|EESE(SWW(SEWN|)N|N))|SSS(EESENSWNWW|)W)|S)|EEE)|NWN(NNWSWNNEE(WWSSENSWNNEE|)|E))|N))|NENWNENWN(W|EESENN(ESSENSWNNW|)WWW)))|ESEEEESWSES(W|E))|E)|ES(EE|SW(SESSSWWS(EEEE(NNWSNESS|)ESEEEE(NWNN|SWW)|S)|N)))|WNNNN(WSNE|)N)|EE(SS|N)))|EEESWW)))|N)|NN)|E))))|E)|N)|NEEN(WW|EENN(WSWENE|)ENEE(NWWEES|)SSW(WSNE|)N))|E)|E))|N)|WWWNNE(NW|ESW))|SS))|SS)|WWWW)|NENWWS(S|WWNENWWS(WNSE|)S))))|WSWWWNNEE(SWEN|)NNNNN(ESEE(EEEENWWWNNWW(NEEEESWSEENNNWNW(NEEES(W|SEE(SWWEEN|)NNNNW(NEE(NWNEWSES|)SE(SSEES(WWW(SEEWWN|)NN|E)|N)|SSS))|S)|S(ESWENW|)W)|SSWW(NEWS|)SS)|WSWWNENW(ESWSEEWWNENW|))))|N)|E)))|S)|E(N|S))|N)))|N)))|WWN(WW(SEWN|)W(NEENNNNW(N|SWS(SENSWN|)W)|W)|E))|S)))|E)|S)|W)|S))|W)|W))|W)|E)|SSW(N|W))|N)|SE(S|E(E|N))))|ENNEESENN(EENWNW(NN(WSNE|)ESE(SESE(NNWESS|)SSSSSS(ENNSSW|)SW(S|NNWWWS(EESNWW|)WWNEN(WNSE|)EEEENN(WWSEWNEE|)N)|N)|S)|W))|S)|WNW(S|N(NWW(SEWN|)W|E)))|WS(S|WWWWW(S|N(W|ENEES(ENSW|)W))))|W(NEWS|)W))|EES(E|W)|N))|N))|E)|ESSE(NN|S(W|SE(NNEWSS|)SWSSW(SEESSNNWWN|)N))))))|WWW)|E)|S))))|NNWWS(SWNNNSSSEN|)E)|SWSS(EEENNWSW(ENESSWENNWSW|)|WW|S))))|N))$';

    public function solve()
    {
        $construction = new Construction(self::INPUT);
        $construction = new Construction('^WSSEESWWWNW(S|NENNEEEENN(ESSSSW(NWSW|SSEN)|WSWWN(E|WWS(E|SS))))WSSEESWWWNW(S|NENNEEEENN(ESSSSW(NWSW|SSEN)|WSWWN(E|WWS(E|SS))))WSSEESWWWNW(S|NENNEEEENN(ESSSSW(NWSW|SSEN)|WSWWN(E|WWS(E|SS))))WSSEESWWWNW(S|NENNEEEENN(ESSSSW(NWSW|SSEN)|WSWWN(E|WWS(E|SS))))WSSEESWWWNW(S|NENNEEEENN(ESSSSW(NWSW|SSEN)|WSWWN(E|WWS(E|SS))))WSSEESWWWNW(S|NENNEEEENN(ESSSSW(NWSW|SSEN)|WSWWN(E|WWS(E|SS))))WSSEESWWWNW(S|NENNEEEENN(ESSSSW(NWSW|SSEN)|WSWWN(E|WWS(E|SS))))$');

        $construction->processPaths();

        return $construction->getFurthestRoomDistance();
    }
}
