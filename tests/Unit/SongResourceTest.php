<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Resources\SongResource;
use App\Http\Resources\AlbumResource;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SongResourceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCorrectDataIsReturnedInResponse()
    {
        $resource = (new SongResource($song = factory('App\Song')->make()))->jsonSerialize();
        $this->assertArraySubset([
            'title' => $song->title,
        ], $resource);
    }


    public function testSongHasAlbumRelationship()
    {
        $resource = (new SongResource($song = factory('App\Song')->make(["album_id" => factory('App\Album')->create(['id' => 1])])))->jsonSerialize();

        $this->assertInstanceOf(AlbumResource::class, $resource["album"]);
    }

    public function testShowsSongCountForMoreThanTenSongs()
    {
        $album1 = factory('App\Album')->make(['id' => 1]);
        $album2 = factory('App\Album')->make(['id' => 2]);


        $album1->songs()->saveMany(factory('App\Song', 11)->make());
        $album2->songs()->saveMany(factory('App\Song', 7)->make());

        $album1_resource = (new AlbumResource($album1))->jsonSerialize();
        $album2_resource = (new AlbumResource($album2))->jsonSerialize();

        $this->assertArraySubset([
            'conditonal_attribute' => 'Attribute value',
        ], $album1_resource);

        $this->assertArrayNotHasKey('conditional_attribute', $album2_resource);
    }
}
