+++
title = 'Guide: Publishing to Hugo/Jekyll Remotely via iOS'
date = 2024-02-25T10:28:12+08:00
tags = 'technology'
disableToC = true
+++

Hugo excels at desktop publishing. I can create files using CLIs or markdown editors, then publish to a Github repository. This directly reflects on the website through Netlify, Cloudflare Pages or Vercel.

However, publishing from my phone is not as straightforward. I have a _micropost_ section on my website, intended to be a Twitter replacement, where I share posts that are:
-  Short
-  Contain photos taken from my phone
-  Can be published quickly

I initially thought that the only feasible way to publish using my phone was via Micro.pub. This is evident in direct integrations with writing apps such as [Ulysses](https://ulysses.app), iA [Writer](https://ia.net) and [Paper](https://papereditor.app). 

The issues with Micro.pub are:
-  It’s extremely difficult to set up for someone without a technical background, like myself.
-  The only feasible way I’ve managed to get this to work is via [Voxpelli’s Solution](https://github.com/voxpelli/webpage-micropub-to-github).
-  Even then, it costs money to host a Micro.pub solution. The only free way I’ve managed to get this to work is via [Render](https://render.com), which only spins up the server when in use. 
-  This is problematic for my use case, because it takes a long time to publish a micropost, it often displays an error, and there’s a high risk of double-posting.

## A Much More Elegant Solution

Because Micro.pub wasn’t working, I stumbled upon a different approach — creating and editing markdown files directly within the GitHub repo istelf.

Unfortunately, GitHub’s native app doesn’t provide an efficient way to create and edit markdown files. That’s when I discovered [Working Copy](https://workingcopy.app) — an iOS Git client that GitHub should have been. 

What’s more interesting is Working Copy’s integration with Shortcut Actions, which allows me to publish microposts via the action button on my iPhone. Hence, you can easily repurpose the shortcut to create your own customised templates or run via widgets or phone back taps.

**Link to my shortcut:** [https://www.icloud.com/shortcuts/c6a068710cc848f3b5d0d98311e8d9fa](https://www.icloud.com/shortcuts/c6a068710cc848f3b5d0d98311e8d9fa)

## Shortcut in Action

I have two types of microposts — with photo and without. My shortcut differentiates the two based on whether the image is within my clipboard:

_Without Photo:_
[https://i.imgur.com/M4ip9K1.mp4](https://i.imgur.com/M4ip9K1.mp4)

_With Photo:_
[https://i.imgur.com/SdWa3Zb.mp4](https://i.imgur.com/SdWa3Zb.mp4)

Note:
-  You’re able to change the note’s file destination and template by adjusting parameters within the shortcut.
-  This method only works on JPEG images.
-  This method assumes that you’ll be posting photos via YAML, rather than in-line. This requires adjustments to be made to layout HTML files with the following code, depending on where you need the image displayed.

{{< highlight html >}}
 {{ if .Params.photo}}
 <img loading=“lazy” src=“{{ .Params.photo }}” alt=“Photo” style=“max-width:200px; height:auto;”>
 {{ end }}
{{< /highlight >}}

---
Hopefully, this quick tutorial is helpful to you! Let me know if you have any questions below.