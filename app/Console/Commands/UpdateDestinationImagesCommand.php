<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateDestinationImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:destination-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all destination circuit pages with provided Cloudinary images';

    /**
     * Available Cloudinary images organized by category
     */
    private $images = [
        'zebra' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zeebraaa_cpydg9.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468788/Zebrah_at_Water_umdou8.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468787/Zebra_comb_pmwqzo.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468787/Zebra_g7htfa.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468787/Zebra_herd_snsutd.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468787/Zebra_cross_gryanq.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468787/Zebra_Pumba_fq3axc.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Zebra_antelope_vqkiya.jpg',
        ],
        'wildebeest' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wwwwwbeest_lnndaz.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468786/Wwildbeest_xghpan.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/Wwilddbeest_vsj6ju.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/Wildzeb_vfs2kz.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildmovement_enpccp.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildebeests-7811819_1920_yihcmq.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildlife-3146790_1920_skrfdw.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/wildlife-3128802_1920_xstzi1.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468785/Wildbeest_Migration_vnkbqc.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468784/wildebeests-7559592_1920_ow1vds.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468784/wildebeest-migration-2322111_1920_zvehye.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468784/wildebeests-7550737_1920_a4wswh.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468783/wildebeest-7460434_1920_anai1s.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468783/wildebeest-7301648_1920_jd2nva.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468782/wildebeest-5730597_1920_r6cxot.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468782/wildebeest-7093885_1920_m60neg.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468782/wildebeest-6880041_1920_tjdwgv.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468782/wildebeest-5400476_1920_oehczq.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468781/Wildebeest_ngorongoro_yv22pd.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468781/Wildbeestttt_zn7yai.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468781/wildbeestriver_kqtgon.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468781/Wildbeest_sm8nga.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468780/Wildbeest_jump_r7hnyp.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468780/Wildbeest_grazing_wfq7lb.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468780/Wildbeest_and_zebra_k5obgc.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468780/Wildbeest_at_Water_m4tlfr.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468780/wildbeeesttt_uvtgij.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468780/Wildbeeest_uibjfu.jpg',
        ],
        'waterbuck' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/water-3093341_1280_1_qa4393.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/Waterbuckk_p4mtpz.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/waterbuck_ggd5wl.jpg',
        ],
        'warthog' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/warttthhog_sg9xqf.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468777/Warttthog_xjcjyw.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/warthog-6605830_1920_f8rvu8.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/Warthogggg_u0jicm.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/warthog-5493446_1920_t4ncij.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/Warthoggg_sbsidu.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/Warthog_oxpecker_iw61nj.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468776/warthog-2801382_1920_lqcdpd.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468775/warthog-4490389_1920_mu6bly.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468775/Warthog_bird_fu02wc.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468774/Waarthog_calves_oankts.jpg',
        ],
        'vulture' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468774/Vulture_xd2vgg.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468774/Untitled-11111_jypaex.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468774/Vulture_Wildbeest_tysgw1.jpg',
        ],
        'trees' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-3079250_1280_m8apya.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_c50vn6.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468773/tree-2600482_1920_1_ruahvn.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tree-222836_1920_bt1bf3.jpg',
        ],
        'tiger' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tiger-5167034_1920_leu8nd.jpg',
        ],
        'tarangire' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/Tarangire_ck2ohe.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468772/tarangire-76483_1920_c7sttf.jpg',
        ],
        'tanzania' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/tanzania-2275107_1920_cmihwj.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468765/Serengeti_wbeest_lxzeyh.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468764/serengeti_central_ok01lq.jpg',
        ],
        'serengeti' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468765/Serengeti_wbeest_lxzeyh.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468764/serengeti_central_ok01lq.jpg',
        ],
        'rhino' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468736/Rhinn0_vipbmb.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468735/Rhino..._pa4yfo.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468735/Rhino_warthog_fvlbgu.jpg',
        ],
        'river' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468735/River_crossing_huq2k4.jpg',
        ],
        'lions' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468733/prideeee_gci90s.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468733/pridee_hygado.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468733/pride_serengeti_exuvmx.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468733/Pride_seregetiiii_dbjtes.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468732/pride_feeding_njpbwt.jpg',
        ],
        'elephant' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468779/Wildb_eleph_uw1asl.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/sunset_eleph_hqxiur.jpg',
        ],
        'diverse' => [
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468771/spphoto_skxxer.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468770/strauss-4642855_1280_i5umy2.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468769/stella-point-4032287_1280_bpmyyh.jpg',
            'https://res.cloudinary.com/dqflffa1o/image/upload/v1777468769/springbok-8063883_1920_bcrj32.jpg',
        ],
        'videos' => [
            'https://res.cloudinary.com/dqflffa1o/video/upload/v1777468764/SaveClip.App_AQOTILD4rjPC4d-jkyKhlFB8w5jzgwwHNZy2ZBVB__5f9d8QZ3fFfwO_WEBwTKs_0ynC-FS0pr0KVrGm-HCmK0TXrJweOZ40Mn02NhE_gaddev.mp4',
            'https://res.cloudinary.com/dqflffa1o/video/upload/v1777468764/SaveClip.App_AQPzVHLZw1D-ZQxCqez8VJhY0Wj_gPRHIUb7_rg-Ue-w9tvUw3tI75QPVL2NBB1j7c7DY1_kDcf1u9TdJIyygwIxo4VuSos0cfkIQEg_p6x1pk.mp4',
            'https://res.cloudinary.com/dqflffa1o/video/upload/v1777468763/SaveClip.App_AQP1g-1i8AlHGj6xP9yidS3U9nWWq1xDIds517SD21xOr-VTwx8AZhrDvfa_VBn7Uoer17AIDy4UJxiUbpzvBXk-PstkUPhkqx09o90_q98vci.mp4',
            'https://res.cloudinary.com/dqflffa1o/video/upload/v1777468763/SaveClip.App_AQOdFrj7BjWL4rNxuyEg4K31fJMdvxItFag6HyADOKIBPh-wibwHTILmCo4MSecQqM12oMaY8m46Ybp2osmF3GzcADgutmmGC9yirk_hfja9e.mp4',
            'https://res.cloudinary.com/dqflffa1o/video/upload/v1777468762/SaveClip.App_AQN0jwMHa31_ZUEIM78ZrdB7vPm_KS2IJFUzyEGbNzHXiDBCXXCTAZhWDCcSfINIVmt8WPntHzsxA0LBG__dahXzji2RNlNCZh-_doQ_eeb5jb.mp4',
        ],
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🖼️ Updating Destination Circuit Images");
        $this->info("📸 Replacing placeholder images with Cloudinary images");
        
        $circuits = [
            'northern-circuit' => [
                'hero' => $this->images['wildebeest'][0],
                'about' => $this->images['zebra'][1],
                'highlights' => [
                    $this->images['lions'][0],
                    $this->images['elephant'][0],
                    $this->images['rhino'][0],
                    $this->images['diverse'][0],
                ]
            ],
            'southern-circuit' => [
                'hero' => $this->images['wildebeest'][5],
                'about' => $this->images['river'][0],
                'highlights' => [
                    $this->images['wildebeest'][10],
                    $this->images['waterbuck'][0],
                    $this->images['trees'][0],
                    $this->images['diverse'][1],
                ]
            ],
            'eastern-circuit' => [
                'hero' => $this->images['tanzania'][0],
                'about' => $this->images['trees'][1],
                'highlights' => [
                    $this->images['elephant'][0],
                    $this->images['trees'][2],
                    $this->images['diverse'][2],
                    $this->images['diverse'][3],
                ]
            ],
            'western-circuit' => [
                'hero' => $this->images['tarangire'][0],
                'about' => $this->images['elephant'][1],
                'highlights' => [
                    $this->images['chimpanzee'][0] ?? $this->images['diverse'][0],
                    $this->images['waterbuck'][1],
                    $this->images['trees'][3],
                    $this->images['diverse'][0],
                ]
            ],
            'ocean-islands' => [
                'hero' => $this->images['diverse'][0],
                'about' => $this->images['diverse'][1],
                'highlights' => [
                    $this->images['diverse'][2],
                    $this->images['diverse'][3],
                    $this->images['diverse'][0],
                    $this->images['diverse'][1],
                ]
            ],
            'mafia-island' => [
                'hero' => $this->images['waterbuck'][2],
                'about' => $this->images['warthog'][0],
                'highlights' => [
                    $this->images['diverse'][0],
                    $this->images['diverse'][1],
                    $this->images['diverse'][2],
                    $this->images['diverse'][3],
                ]
            ],
            'zanzibar-island' => [
                'hero' => $this->images['tanzania'][1],
                'about' => $this->images['serengeti'][1],
                'highlights' => [
                    $this->images['diverse'][0],
                    $this->images['diverse'][1],
                    $this->images['diverse'][2],
                    $this->images['diverse'][3],
                ]
            ],
        ];
        
        $successCount = 0;
        $totalCount = count($circuits);
        
        foreach ($circuits as $circuit => $images) {
            $this->info("\n🔄 Updating: {$circuit}");
            
            try {
                $this->updateCircuitView($circuit, $images);
                $this->info("   ✅ {$circuit} updated successfully");
                $successCount++;
            } catch (\Exception $e) {
                $this->error("   ❌ Failed to update {$circuit}: " . $e->getMessage());
            }
        }
        
        $this->info("\n📊 Image Update Results:");
        $this->info("✅ Successful: {$successCount}/{$totalCount}");
        $this->info("❌ Failed: " . ($totalCount - $successCount) . "/{$totalCount}");
        
        if ($successCount === $totalCount) {
            $this->info("\n🎉 ALL DESTINATION IMAGES UPDATED!");
            $this->info("📸 All circuit pages now use Cloudinary images");
            $this->info("🖼️ Professional wildlife photography throughout");
            $this->info("🌐 Better visual appeal for visitors");
        } else {
            $this->error("\n💔 Some image updates failed. Check the errors above.");
        }
        
        return $successCount === $totalCount ? 0 : 1;
    }
    
    private function updateCircuitView($circuit, $images)
    {
        $viewPath = resource_path("views/circuits/{$circuit}.blade.php");
        
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: {$viewPath}");
        }
        
        $content = file_get_contents($viewPath);
        
        // Replace ALL Unsplash images with Cloudinary images
        $content = preg_replace(
            '/https:\/\/images\.unsplash\.com\/[^"\']*/',
            $images['hero'],
            $content
        );
        
        // Replace ALL placeholder images with Cloudinary images
        $placeholderPatterns = [
            '/https:\/\/images\.pexels\.com\/[^"\']*/',
            '/https:\/\/source\.unsplash\.com\/[^"\']*/',
            '/https:\/\/picsum\.photos\/[^"\']*/',
        ];
        
        foreach ($placeholderPatterns as $pattern) {
            $content = preg_replace($pattern, $images['hero'], $content);
        }
        
        // Update specific image sections with appropriate Cloudinary images
        $highlightIndex = 0;
        $content = preg_replace_callback(
            '/<img src="([^"]*)" alt="([^"]*)" class="([^"]*)">/',
            function($matches) use ($images, &$highlightIndex) {
                $currentSrc = $matches[1];
                $alt = $matches[2];
                $class = $matches[3];
                
                // If it's already a Cloudinary image, keep it
                if (strpos($currentSrc, 'res.cloudinary.com') !== false) {
                    return $matches[0];
                }
                
                // Replace with appropriate Cloudinary image
                if ($highlightIndex < count($images['highlights'])) {
                    $image = $images['highlights'][$highlightIndex];
                    $highlightIndex++;
                } else {
                    $image = $images['hero'];
                }
                
                return '<img src="' . $image . '" alt="' . $alt . '" class="' . $class . '">';
            },
            $content
        );
        
        file_put_contents($viewPath, $content);
    }
}
