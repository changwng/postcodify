<?php

/**
 *  Postcodify - 도로명주소 우편번호 검색 프로그램 (서버측 API)
 * 
 *  Copyright (c) 2014, Kijin Sung <root@poesis.kr>
 * 
 *  이 프로그램은 자유 소프트웨어입니다. 이 소프트웨어의 피양도자는 자유
 *  소프트웨어 재단이 공표한 GNU 약소 일반 공중 사용 허가서 (GNU LGPL) 제3판
 *  또는 그 이후의 판을 임의로 선택하여, 그 규정에 따라 이 프로그램을
 *  개작하거나 재배포할 수 있습니다.
 * 
 *  이 프로그램은 유용하게 사용될 수 있으리라는 희망에서 배포되고 있지만,
 *  특정한 목적에 맞는 적합성 여부나 판매용으로 사용할 수 있으리라는 묵시적인
 *  보증을 포함한 어떠한 형태의 보증도 제공하지 않습니다. 보다 자세한 사항에
 *  대해서는 GNU 약소 일반 공중 사용 허가서를 참고하시기 바랍니다.
 * 
 *  GNU 약소 일반 공중 사용 허가서는 이 프로그램과 함께 제공됩니다.
 *  만약 허가서가 누락되어 있다면 자유 소프트웨어 재단으로 문의하시기 바랍니다.
 */

class Postcodify_Areas
{
    // 전국의 시도 목록.
    
    public static $sido = array(
        '서울' => '서울특별시', '서울시' => '서울특별시', '서울특별시' => '서울특별시',
        '부산' => '부산광역시', '부산시' => '부산광역시', '부산광역시' => '부산광역시',
        '대구' => '대구광역시', '대구시' => '대구광역시', '대구광역시' => '대구광역시',
        '대전' => '대전광역시', '대전시' => '대전광역시', '대전광역시' => '대전광역시',
        '인천' => '인천광역시', '인천시' => '인천광역시', '인천광역시' => '인천광역시',
        '광주' => '광주광역시', '광주시' => '광주광역시', '광주광역시' => '광주광역시',
        '울산' => '울산광역시', '울산시' => '울산광역시', '울산광역시' => '울산광역시',
        '세종' => '세종특별자치시', '세종시' => '세종특별자치시', '세종특별자치시' => '세종특별자치시',
        '제주' => '제주특별자치도', '제주도' => '제주특별자치도', '제주특별자치도' => '제주특별자치도',
        '강원' => '강원도', '강원도' => '강원도', '경기' => '경기도', '경기도' => '경기도',
        '경남' => '경상남도', '경상남도' => '경상남도',
        '경북' => '경상북도', '경상북도' => '경상북도',
        '전남' => '전라남도', '전라남도' => '전라남도',
        '전북' => '전라북도', '전라북도' => '전라북도',
        '충남' => '충청남도', '충청남도' => '충청남도',
        '충북' => '충청북도', '충청북도' => '충청북도',
    );
    
    // 전국의 시군구 목록. (특별시 및 광역시의 자치구만 포함, 나머지는 아래에 "일반구"로 별도 표기)
    
    public static $sigungu = array(
        '종로구', '중구', '용산구', '성동구', '광진구', '동대문구', '중랑구', '성북구', '강북구',
        '도봉구', '노원구', '은평구', '서대문구', '마포구', '양천구', '강서구', '구로구',
        '금천구', '영등포구', '동작구', '관악구', '서초구', '강남구', '송파구', '강동구',  // 서울
        '중구', '서구', '동구', '영도구', '부산진구', '동래구', '남구', '북구', '해운대구',
        '사하구', '금정구', '강서구', '연제구', '수영구', '사상구', '기장군',  // 부산
        '중구', '동구', '서구', '남구', '북구', '수성구', '달서구', '달성군',  // 대구
        '중구', '동구', '남구', '연수구', '남동구', '부평구', '계양구', '서구', '강화군', '옹진군',  // 인천
        '동구', '서구', '남구', '북구', '광산구',  // 광주
        '동구', '중구', '서구', '유성구', '대덕구',  // 대전
        '중구', '남구', '동구', '북구', '울주군',  // 울산
        '수원시', '성남시', '의정부시', '안양시', '부천시', '광명시', '평택시', '동두천시',
        '안산시', '고양시', '과천시', '구리시', '남양주시', '오산시', '시흥시', '군포시',
        '의왕시', '하남시', '용인시', '파주시', '이천시', '안성시', '김포시', '화성시',
        '광주시', '양주시', '포천시', '여주시', '연천군', '가평군', '양평군',  // 경기
        '춘천시', '원주시', '강릉시', '동해시', '태백시', '속초시', '삼척시',
        '홍천군', '횡성군', '영월군', '평창군', '정선군', '철원군', '화천군',
        '양구군', '인제군', '고성군', '양양군',  // 강원
        '창원시', '진주시', '통영시', '사천시', '김해시', '밀양시', '거제시', '양산시',
        '의령군', '함안군', '창녕군', '고성군', '남해군', '하동군', '산청군', '함양군',
        '거창군', '합천군',  // 경남
        '포항시', '경주시', '김천시', '안동시', '구미시', '영주시', '영천시', '상주시',
        '문경시', '경산시', '군위군', '의성군', '청송군', '영양군', '영덕군', '청도군',
        '고령군', '성주군', '칠곡군', '예천군', '봉화군', '울진군', '울릉군',  // 경북
        '목포시', '여수시', '순천시', '나주시', '광양시', '담양군', '곡성군', '구례군',
        '고흥군', '보성군', '화순군', '장흥군', '강진군', '해남군', '영암군', '무안군',
        '함평군', '영광군', '장성군', '완도군', '진도군', '신안군',  // 전남
        '전주시', '군산시', '익산시', '정읍시', '남원시', '김제시', '완주군', '진안군',
        '무주군', '장수군', '임실군', '순창군', '고창군', '부안군',  // 전북
        '천안시', '공주시', '보령시', '아산시', '서산시', '논산시', '계룡시', '금산군',
        '연기군', '부여군', '서천군', '청양군', '홍성군', '예산군', '태안군', '당진군',  // 충남
        '청주시', '충주시', '제천시', '보은군', '옥천군', '영동군', '증평군',
        '진천군', '괴산군', '음성군', '단양군',  // 충북
        '제주시', '서귀포시',  // 제주
    );
    
    // 전국의 일반구 목록. (특별시나 광역시가 아닌 시 아래의 구)
    
    public static $ilbangu = array(
        '고양시' => array('덕양구', '일산동구', '일산서구'),
        '부천시' => array('소사구', '오정구', '원미구'),
        '성남시' => array('분당구', '수정구', '중원구'),
        '수원시' => array('권선구', '영통구', '장안구', '팔달구'),
        '안산시' => array('단원구', '상록구'),
        '안양시' => array('동안구', '만안구'),
        '용인시' => array('기흥구', '수지구', '처인구'),
        '전주시' => array('덕진구', '완산구'),
        '천안시' => array('동남구', '서북구'),
        '창원시' => array('마산합포구', '마산회원구', '성산구', '의창구', '진해구'),
        '청주시' => array('상당구', '흥덕구', '청원구', '서원구'),
        '포항시' => array('남구', '북구'),
    );
}
