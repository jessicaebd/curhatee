<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'How do we relate to objects? Looking for individuals who have difficulties with OCD &/or hoarding',
            'content' => 'I honestly do not believe that most people think of non-living things as being alive, or people, when they refer to them as She or Her etc. In the past, I\'ve done this with my car but I am fully aware it is neither alive nor a person. I\'d still do the survey though.',
            'likes' => 20
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Daily struggle',
            'content' => '<p>- It’s a tiredness of the mind.</p>
            <p>- Seems these day I just feel tired all the time.</p>
            <p>- Can’t chase the regrets from the past away.</p>
            <p>- Sometimes I just want to overdose comatose.</p>
            <p>- And just never awake.</p>
            <br>
            <p>- People are not the answer , they are part of the problem.</p>
            <p>- Just.</p>
            <p>- Don’t get on with my own kind.</p>
            <p>- I watch them enjoying freedom.</p>
            <p>- But I am caged and wild , been that way since a child.</p>
            <p>- Feel alone , can’t seem to find , me !</p>
            <br>
            <p>- Don’t know what the answer is.</p>
            <p>- All I know is , there must be more than this.</p>
            <p>- I don’t know where happiness lives.</p>
            <p>- Not inside me , that’s something I’ve never been with.</p>
            <br>
            <p>- The days drag on , the nights pour the sadness on.</p>
            <p>- Loneliness wears me like a second skin.</p>
            <p>- It’s horrible when you can’t fit in.</p>
            <p>- Feel like giving up , suicidal thoughts torment me.</p>
            <p>- Guess I better take more meds.</p>
            <p>- Only time I get relief is when I am asleep.</p>',
            'likes' => 60
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Whats going on with me?',
            'content' => 'Normally I’m down. Always down. Low energy, tired and ready to sleep. But this week I’ve been all over the place. I’ve felt like a machine that won’t stop. I’ve been panicky, trembling, constantly doing something. I haven’t been sleeping well even with melatonin and unisom. It’s 2:30 in the morning and I would rather be up cleaning something.',
            'likes' => 120
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'I am in utter confusion.',
            'content' => 'I have all of these dramas going on that make no sense. I tried to trust these social work agencies and one appears to have bit me so hard with their mistakes I now owe medical care costs in the thousands because they withheld information/my mail from me. There aren’t words. And at the same time it appears that my family retaliated for my turning them into Adult Protective Service near the very end of my mom’s life and social workers got involved.
            Basically they seem to have had my SSI and medical insurance cancelled! This means I have to go back to sleeping on the streets continually again. I can’t imagine my mom on her death bed telling them to destroy what little I have over such anger/social worker involvement? I have just taken a break from crying for over an hour.My life is suddenly turning back into an unmanageable nightmare all over again.',
            'likes' => 220
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Opening up',
            'content' => 'I opened up to my husband last night about how bad things really are mentally for me and he was upset because he didn’t know the severity of where I’m at. I told him about the hallucinations and the voices that egg on to self harm but also worse more recently and how much I’m really struggling.. To the point I took a sheet of diazepam upstairs to my shower room (the only door with a lock) and was going to follow through with instructions. There’s 22 years between us so I understand that he finds it hard but he definitely has more of an understanding after I spoke to him but I feel really bad that he didn’t know just as bad because it sounds like I’m hiding it from him but it’s not, I didnt want him to see me in a different way, to feel like he’s disappointed. I feel like I’m going crazy anyway and to admit about the voices makes me feel even crazier. I’m only supposed to take diazepam prn but I’m taking it everyday because it knocks me out combined with my other meds but now I think I’m getting addicted to it. I have a very addictive personality and have been an addict (both recreational and prescription) before. I had a risk assessment with my gp on Monday and need to have another one in 3 weeks time.... I don’t know what I’m doing anymore... I’m drained in every way possible',
            'likes' => 200
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Vulnerability is scary..',
            'content' => '<p>I was talking to my clinician yesterday, only a quick call this time because I had to go out but she wanted to check something with me after our last conversation so I answered in complete honesty.</p>
            <br>
            <p>Later on when I got home it occurred to me how much I’ve disclosed to her and how much of that she’s disclosed to my GP.</p>
            <p>It kinda scared me a little bit that people know so much.</p>
            <br>
            <p>Does anyone else get these sudden realisations of how much you’ve shared, the vulnerable side of yourself?</p>',
            'likes' => 100
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Feel like self harming',
            'content' => 'I’m so tired if being emotionally destroyed by the men I meet when It comes to dating, relationships & casual acquaintances it seem like when men meet me it releases their inner bully, they either manipulate me financially, insult me with degrading names or talk bad about my physical appearance. All I meet is monsters I’m so tired of arguing & fighting for respect I’m a nice person I don’t provoke people and all I do is get hurt these men wish evil on me they take my money destroy my career & leave me stranded. I have a natural soft raspy voice and men don’t find that attractive or they see it as I’m weak individual so they bully me & that is the pinpoint of the disrespectful behavior. It feel like I have a paper sign on my head saying BE MEAN TO HER I’m so fed up I just want to self harm to release the pain inside spiritually & self harm as a symbol to be done with relationships & not trust no one. Whether it’s a boyfriend, a coworker or a potential male date they all have demonically & painfully hurt me physically, mentally & financially. Its like a never ending cycle of pain. I have more stressful days than peaceful and good days in life and I just want to self harm to release the sadness I feel. MY SPIRIT IS BROKEN & TIRED. I CAN’T TAKE IT NO MORE I FEEL CURSED. LIFE IS HARD',
            'likes' => 300
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'I hear a voice that speaks through my mouth.',
            'content' => 'I have been hearing a voice in my mind. It is a manly voice. This voice mostly speaks through my mouth. It speaks out of my mouth when no one is around. More frequently, it speaks in my mouth (while my mouth is closed, my tongue moves on its own) when I am around people or am alone. The voice says its objective is to make me suffer. In addition, there is a ton of physical pain that this voice claims to have given me (headache, eye pain, heavy/rigid/tight/weak legs and arms, brain fog, inability to hold my body up or weak posture, anxiety, and more). Also, I sometimes get random sharp pains in my body and the voice tells me that it gave me that pain. The voice seems to have a good amount of control over my body when it wants to do something to me (e.g. give me pain or slightly move my body). Has anyone ever heard of something like this? If you know of anyone suffering in this exact way, please let me know. I feel like I am the only person in the world with this exact problem. Please help ?.',
            'likes' => 250
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => '"Normal" people are NOT better',
            'content' => '<p>I just want to share a recent example of something that makes me appreciate the "mentally ill" and KNOW that those that identify as "healthy" are oft times full of $%^&.</p>
            <p>My neighbor had a death in the family and the obit is full of lies. This family is more chock full of issues than your average therapy going "ill" person, but it is mostly arrogant narcissistic facade. People have been snarky to me so often because of my "illness", yet here these people who are so attached to image that the obit for this family member is full of LIES. The woman had left her husband and 5 kids more than 5 years ago, moved near where I live which is about 600 miles from her kids, yet her obit calls her a "homemaker", lists her ex husband who is remarried as HER husband and even lists wrong towns where some of her family around here live.</p>
            <p>Years back another family member talked my ear off about family stuff and switched last names around, giving one sister’s married name to a different sister who lived in another state, etc.</p>
            <br>
            <p>I just wanted to post that so often us "ill" folks are honest to a fault, try so hard to be correct, take blame and responsibility while processing all kinds of experiences, yet, as is often the case in my experience, those who self label as "healthy" and think seeing therapists and such as curious or wrong, are really people who lie and pretend and blame others.
            I learned many years ago that one documented trait of people who don’t get depressed is an abundance of "self serving bias" (lying to yourself about whatever to make yourself feel good).</p>',
            'likes' => 300
        ]);

        Forum::create([
            'user_id' => User::all()->random()->id,
            'title' => 'I’ve given up',
            'content' => 'I’m done with life I don’t want to kill myself but do want to not be here every one around me treats me so badly I do everything I can for others and all I get in return is crap I want to run away and never come back',
            'likes' => 200
        ]);
    }
}
