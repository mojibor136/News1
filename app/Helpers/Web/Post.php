<?php
use App\Models\Post;
use App\Models\Category;

function getPostGroups() {

    $allPosts = Post::where( 'status', 'approve' )->latest()->get();

    $countryId = Category::where( 'name', 'সারাদেশ' )->value( 'id' );
    $nationalCategoryId = Category::where( 'name', 'জাতীয়' )->value( 'id' );
    $politicsCategoryId = Category::where( 'name', 'রাজনীতি' )->value( 'id' );
    $internationalCategoryId = Category::where( 'name', 'আন্তর্জাতিক' )->value( 'id' );
    $CapitalCategoryId = Category::where( 'name', 'রাজধানী' )->value( 'id' );
    $EntertainmentCategoryId = Category::where( 'name', 'বিনোদন' )->value( 'id' );
    $SportsCategoryId = Category::where( 'name', 'খেলা' )->value( 'id' );
    $EconomyCategoryId = Category::where( 'name', 'অর্থনীতি' )->value( 'id' );
    $CourtCategoryId = Category::where( 'name', 'আইন-আদালত' )->value( 'id' );
    $FaceCategoryId = Category::where( 'name', ' মুখোমুখি' )->value( 'id' );
    $HealthCategoryId = Category::where( 'name', 'স্বাস্থ্য ও চিকিৎসা' )->value( 'id' );
    $LifestyleCategoryId = Category::where( 'name', 'লাইফস্টাইল' )->value( 'id' );
    $ReligionCategoryId = Category::where( 'name', 'ধর্ম' )->value( 'id' );
    $LiteratureCategoryId = Category::where( 'name', 'শিল্প-সাহিত্য' )->value( 'id' );
    $ExpatriateCategoryId = Category::where( 'name', 'প্রবাস জীবন' )->value( 'id' );
    $SchoolCategoryId = Category::where( 'name', 'শিক্ষাঙ্গন' )->value( 'id' );
    $FunCategoryId = Category::where( 'name', 'মজার খবর' )->value( 'id' );
    $SevenCategoryId = Category::where( 'name', 'সাতরং' )->value( 'id' );
    $FeatureCategoryId = Category::where( 'name', 'ফিচার' )->value( 'id' );
    $JobCategoryId = Category::where( 'name', 'জব কর্নার' )->value( 'id' );
    $TechnologyCategoryId = Category::where( 'name', 'তথ্যপ্রযুক্তি' )->value( 'id' );

    $NationalPost = $allPosts->where( 'category_id', $nationalCategoryId );
    $OneNationalPost = $NationalPost->take( 1 )->first();
    $NationalPost = $NationalPost->take( 4 );

    $PoliticsPost = $allPosts->where( 'category_id', $politicsCategoryId );
    $OnePoliticsPost = $PoliticsPost->take( 1 )->first();
    $PoliticsPost = $PoliticsPost->take( 4 );

    $CountryPost = $allPosts->where( 'category_id', $countryId );
    $OneCountryPost = $CountryPost->take( 1 )->first();
    $CountryPost = $CountryPost->take( 4 );

    $InternationalPost = $allPosts->where( 'category_id', $internationalCategoryId );
    $OneInternationalPost = $InternationalPost->take( 1 )->first();
    $InternationalPost = $InternationalPost->take( 4 );

    $CapitalPost = $allPosts->where( 'category_id', $CapitalCategoryId );
    $OneCapitalPost = $CapitalPost->take( 1 )->first();
    $CapitalPost = $CapitalPost->take( 4 );

    $EntertainmentPost = $allPosts->where( 'category_id', $EntertainmentCategoryId );
    $OneEntertainmentPost = $EntertainmentPost->take( 1 )->first();
    $EntertainmentPost = $EntertainmentPost->take( 3 );

    $SportsPost = $allPosts->where( 'category_id', $SportsCategoryId );
    $OneSportsPost = $SportsPost->take( 1 )->first();
    $TowSportsPost = $SportsPost->take( 2 );
    $SixSportsPost = $SportsPost->take( 6 );

    $EconomyPost = $allPosts->where( 'category_id', $EconomyCategoryId );
    $OneEconomyPost = $EconomyPost->take( 1 )->first();
    $ForEconomyPost = $EconomyPost->take( 4 );

    $CourtPost = $allPosts->where( 'category_id', $CourtCategoryId );
    $OneCourtPost = $CourtPost->take( 1 )->first();
    $TCourtPost = $CourtPost->take( 3 );

    $FacePost = $allPosts->where( 'category_id', $FaceCategoryId );
    $OneFacePost = $FacePost->take( 1 )->first();
    $TFacePost = $FacePost->take( 3 );

    $HealthPost = $allPosts->where( 'category_id', $HealthCategoryId );
    $OneHealthPost = $HealthPost->take( 1 )->first();
    $THealthPost = $HealthPost->take( 3 );

    $LifestylePost = $allPosts->where( 'category_id', $LifestyleCategoryId );
    $LifestylePost = $LifestylePost->take( 4 );

    $ReligionPost = $allPosts->where( 'category_id', $ReligionCategoryId );
    $OneReligionPost = $ReligionPost->take( 1 )->first();
    $TReligionPost = $ReligionPost->take( 3 );

    $LiteraturePost = $allPosts->where( 'category_id', $LiteratureCategoryId );
    $OneLiteraturePost = $LiteraturePost->take( 1 )->first();
    $TLiteraturePost = $LiteraturePost->take( 3 );

    $ExpatriatePost = $allPosts->where( 'category_id', $ExpatriateCategoryId );
    $OneExpatriatePost = $ExpatriatePost->take( 1 )->first();
    $TExpatriatePost = $ExpatriatePost->take( 3 );

    $SchoolPost = $allPosts->where( 'category_id', $SchoolCategoryId );
    $OneSchoolPost = $SchoolPost->take( 1 )->first();
    $TSchoolPost = $SchoolPost->take( 3 );

    $FunPost = $allPosts->where( 'category_id', $FunCategoryId );
    $OneFunPost = $FunPost->take( 1 )->first();
    $TFunPost = $FunPost->take( 3 );

    $SevenPost = $allPosts->where( 'category_id', $SevenCategoryId );
    $OneSevenPost = $SevenPost->take( 1 )->first();
    $TSevenPost = $SevenPost->take( 3 );

    $FeaturePost = $allPosts->where( 'category_id', $FeatureCategoryId );
    $OneFeaturePost = $FeaturePost->take( 1 )->first();
    $TFeaturePost = $FeaturePost->take( 3 );

    $JobPost = $allPosts->where( 'category_id', $JobCategoryId );
    $OneJobPost = $JobPost->take( 1 )->first();
    $TJobPost = $JobPost->take( 3 );

    $TechnologyPost = $allPosts->where( 'category_id', $TechnologyCategoryId );
    $OneTechnologyPost = $TechnologyPost->take( 1 )->first();
    $TTechnologyPost = $TechnologyPost->take( 3 );

    return [
        'latest' => $allPosts->first(),
        'two' => $allPosts->slice( 1, 2 ),
        'four' => $allPosts->slice( 3, 4 ),
        'sixPosts' => $allPosts->slice( 4, 6 ),
        'NationalPost' => $NationalPost,
        'OneNationalPost' => $OneNationalPost,
        'PoliticsPost' => $PoliticsPost,
        'OnePoliticsPost' => $OnePoliticsPost,
        'CountryPost' => $CountryPost,
        'OneCountryPost' => $OneCountryPost,
        'allPosts' => $allPosts,
        'InternationalPost' => $InternationalPost,
        'OneInternationalPost' => $OneInternationalPost,
        'CapitalPost' => $CapitalPost,
        'OneCapitalPost' => $OneCapitalPost,
        'EntertainmentPost' => $EntertainmentPost,
        'OneEntertainmentPost' => $OneEntertainmentPost,
        'OneSportsPost' => $OneSportsPost,
        'TowSportsPost' => $TowSportsPost,
        'SixSportsPost' => $SixSportsPost,
        'ForEconomyPost' => $ForEconomyPost,
        'OneEconomyPost' => $OneEconomyPost,
        'OneCourtPost' => $OneCourtPost,
        'TCourtPost' => $TCourtPost,
        'TFacePost' => $TFacePost,
        'OneFacePost' => $OneFacePost,
        'OneHealthPost' => $OneHealthPost,
        'THealthPost' => $THealthPost,
        'LifestylePost' => $LifestylePost,
        'TReligionPost' => $TReligionPost,
        'OneReligionPost' => $OneReligionPost,
        'OneLiteraturePost' => $OneLiteraturePost,
        'TLiteraturePost' => $TLiteraturePost,
        'OneExpatriatePost' => $OneExpatriatePost,
        'TExpatriatePost' => $TExpatriatePost,
        'TSchoolPost' => $TSchoolPost,
        'OneSchoolPost' => $OneSchoolPost,
        'OneFunPost' => $OneFunPost,
        'TFunPost' => $TFunPost,
        'OneSevenPost' => $OneSevenPost,
        'TSevenPost' => $TSevenPost,
        'OneFeaturePost' => $OneFeaturePost,
        'TFeaturePost' => $TFeaturePost,
        'TJobPost' => $TJobPost,
        'OneJobPost' => $OneJobPost,
        'TTechnologyPost' => $TTechnologyPost,
        'OneTechnologyPost' => $OneTechnologyPost,
    ];
}
