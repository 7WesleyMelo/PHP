<?php 

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;
use PDO;

class VideoFormController implements Controller
{
    public function __construct(private VideoRepository $repository)
    {

    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        // var_dump($id);
        // exit;
        $video = null;
    
        if ($id !== false && $id !== null) {
           $video = $this->find($id);

        }

       require_once __DIR__ . '/../../views/video_form.php';
    }

    /**
     * @return Video[]
     */
    public function all(): array
    {
        $videoList = $this->repository->pdo
            ->query('SELECT * from videos order by id asc;')
            ->fetchAll(PDO::FETCH_ASSOC);
        return array_map(
            $this->hydrateVideo(...),
            $videoList
        );
    }

    public function find(int $id)
    {
        $statement = $this->repository->pdo->prepare('SELECT * from videos where id = ?;');
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        return $this->hydrateVideo($statement->fetch(PDO::FETCH_ASSOC));
    }

    private function hydrateVideo(array $videoData): Video
    {
        $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);

        return $video;
    }
}