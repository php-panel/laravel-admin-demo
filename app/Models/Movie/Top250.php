<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class Top250 extends Model
{
    public function paginate()
    {
        $perPage = Request::get('per_page', 10);
        $page = Request::get('page', 1);
        $start = ($page - 1) * $perPage;

        // 使用本地mock数据替代豆瓣API
        $mockMovies = $this->getMockMovies();

        // 计算分页
        $total = count($mockMovies);
        $subjects = array_slice($mockMovies, $start, $perPage);

        $movies = static::hydrate($subjects);
        $paginator = new LengthAwarePaginator($movies, $total, $perPage);
        $paginator->setPath(url()->current());

        return $paginator;
    }

    /**
     * 获取本地mock电影数据
     */
    private function getMockMovies()
    {
        return [
            [
                'id' => '1292052',
                'title' => '肖申克的救赎',
                'original_title' => 'The Shawshank Redemption',
                'year' => '1994',
                'images' => [
                    'small' => 'https://img3.doubanio.com/view/photo/s_ratio_poster/public/p480747492.webp',
                    'large' => 'https://img3.doubanio.com/view/photo/s_ratio_poster/public/p480747492.webp',
                    'medium' => 'https://img3.doubanio.com/view/photo/s_ratio_poster/public/p480747492.webp'
                ],
                'directors' => [
                    ['id' => '1047973', 'name' => '弗兰克·德拉邦特']
                ],
                'castList' => [
                    ['id' => '1054395', 'name' => '蒂姆·罗宾斯'],
                    ['id' => '1054396', 'name' => '摩根·弗里曼']
                ],
                'genres' => ['剧情', '犯罪'],
                'rating' => ['average' => 9.7]
            ],
            [
                'id' => '1291546',
                'title' => '霸王别姬',
                'original_title' => '霸王别姬',
                'year' => '1993',
                'images' => [
                    'small' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2561716440.webp',
                    'large' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2561716440.webp',
                    'medium' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2561716440.webp'
                ],
                'directors' => [
                    ['id' => '1054456', 'name' => '陈凯歌']
                ],
                'castList' => [
                    ['id' => '1054521', 'name' => '张国荣'],
                    ['id' => '1054522', 'name' => '张丰毅']
                ],
                'genres' => ['剧情', '爱情', '同性'],
                'rating' => ['average' => 9.6]
            ],
            [
                'id' => '1295644',
                'title' => '阿甘正传',
                'original_title' => 'Forrest Gump',
                'year' => '1994',
                'images' => [
                    'small' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2372307693.webp',
                    'large' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2372307693.webp',
                    'medium' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2372307693.webp'
                ],
                'directors' => [
                    ['id' => '1047973', 'name' => '罗伯特·泽米吉斯']
                ],
                'castList' => [
                    ['id' => '1054394', 'name' => '汤姆·汉克斯'],
                    ['id' => '1084337', 'name' => '罗宾·怀特']
                ],
                'genres' => ['剧情', '爱情'],
                'rating' => ['average' => 9.5]
            ],
            [
                'id' => '1292720',
                'title' => '泰坦尼克号',
                'original_title' => 'Titanic',
                'year' => '1997',
                'images' => [
                    'small' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2557573348.webp',
                    'large' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2557573348.webp',
                    'medium' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2557573348.webp'
                ],
                'directors' => [
                    ['id' => '1047973', 'name' => '詹姆斯·卡梅隆']
                ],
                'castList' => [
                    ['id' => '1000391', 'name' => '莱昂纳多·迪卡普里奥'],
                    ['id' => '1054438', 'name' => '凯特·温丝莱特']
                ],
                'genres' => ['剧情', '爱情', '灾难'],
                'rating' => ['average' => 9.5]
            ],
            [
                'id' => '1296141',
                'title' => '这个杀手不太冷',
                'original_title' => 'Léon',
                'year' => '1994',
                'images' => [
                    'small' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p511118051.webp',
                    'large' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p511118051.webp',
                    'medium' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p511118051.webp'
                ],
                'directors' => [
                    ['id' => '1031355', 'name' => '吕克·贝松']
                ],
                'castList' => [
                    ['id' => '1000219', 'name' => '让·雷诺'],
                    ['id' => '1054488', 'name' => '娜塔莉·波特曼']
                ],
                'genres' => ['剧情', '动作', '犯罪'],
                'rating' => ['average' => 9.4]
            ]
        ];
    }
}
