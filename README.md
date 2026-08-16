# BetterMultiWorld

> **This project is based on [MultiWorld](https://github.com/CzechPMDevs/MultiWorld) by [CzechPMDevs](https://github.com/CzechPMDevs) (VixikCZ, fuyutsuki, kaliiks), licensed under GPL-3.0.**
> This is not an official fork/continuation — it's an independent repository started from that codebase to keep extending it with new features. All credit for the original plugin goes to CzechPMDevs. See [Credits](#credits) and [License](#license) below.

<p align="center">
  <a href="https://github.com/Phoenix4041/BetterMultiWorld/releases/latest/download/BetterMultiWorld.phar">
    <img src="https://img.shields.io/badge/download-latest%20.phar-2ea44f?style=for-the-badge&logo=github">
  </a>
  <a href="https://github.com/Phoenix4041/BetterMultiWorld/releases/latest">
    <img src="https://img.shields.io/github/v/release/Phoenix4041/BetterMultiWorld?style=for-the-badge&label=release">
  </a>
</p>

<a align="center"><img src="https://ibb.co/V0VtxPrm"></a>

<p align="center">
  <a href="https://www.paypal.com/donate/?hosted_button_id=SRQH6M2S6LV6Y;">
    <img src="https://img.shields.io/badge/donate-paypal-ff69b4?style=for-the-badge&logo=paypal">  
  </a>
  <a href="https://poggit.pmmp.io/ci/CzechPMDevs/MultiWorld/MultiWorld">  
    <img src="https://poggit.pmmp.io/ci.shield/CzechPMDevs/MultiWorld/MultiWorld?style=for-the-badge">  
  </a>  
  <a href="https://discord.gg/uwBf2jS">  
    <img src="https://img.shields.io/discord/365202594932719616.svg?style=for-the-badge&color=7289da&logo=discord&logoColor=white&logoWidth=12">  
  </a>
  <a href="https://poggit.pmmp.io/p/MultiWorld">  
    <img src="https://poggit.pmmp.io/shield.downloads/MultiWorld?style=for-the-badge">  
  </a> 
<br><br>
    ✔️ Passing PHPStan Level 9
    <br>
    ✔️ Simple world management commands
    <br>
    ✔️ Custom generators (Vanilla, Ender, Nether, Void, SkyBlock)
    <br>
    ✔️ Supports last PocketMine API version
    <br>
    ✔️ Multi-language system
    <br>
    ✔️ Simple API for other plugins
    <br>
    ✔️ Command autofill
    <br><br>
</p>

### A world management plugin for PocketMine-MP with custom terrain generators, multi-language support and a form-based management UI.

---

## Features

* **World Creation**: Generate new worlds with a custom seed and a choice of generator
* **World Duplication**: Clone an existing world under a new name
* **Load / Unload**: Load or unload worlds without restarting the server
* **Rename**: Rename a world's folder and its stored level data together
* **Teleportation**: Teleport yourself or another player to a world's spawn
* **World Info**: Inspect name, folder, player count, generator, seed and time of any world
* **Lobby & Spawn Management**: Set the server's default world/lobby or a world's spawn from your current position in-game
* **Form-Based Manager**: `/mw manage` opens a GUI to run every action above without typing commands
* **Custom Generators**: Vanilla-ported Overworld and Nether (biome-accurate terrain), Ender, Void and SkyBlock, plus PocketMine's built-in Normal/Nether/Flat as legacy options
* **Multi-Language System**: Per-player language selection with automatic fallback to a configured default
* **Debug Tooling**: `/mw debug` reports the current chunk and biome for diagnosing generator issues
* **Command Autofill**: All subcommands and their arguments are registered through Commando for in-game tab completion

---

## Requirements

* PocketMine-MP 5.x (tested against 5.44.3)
* PHP 8.1+
* `ext-yaml`, `ext-json`

Bundled as virions at build time (see [.poggit.yml](.poggit.yml)): Commando, libpmform, VanillaGenerator.

---

## Installation

1. Download the latest `.phar` from the [Releases page](https://github.com/Phoenix4041/BetterMultiWorld/releases/latest) (or use the download badge above), or build it yourself from source
2. Move the downloaded file into your server's `plugins/` folder
3. Restart the server

---

## Configuration

The plugin generates `config.yml` and a `languages/` folder on first run. Set the default language and whether to force it for every player in `config.yml`; no further setup is required to use the default settings.

---

## Permissions

```yaml
multiworld.command             # Base permission for /multiworld
multiworld.command.create      # /mw create
multiworld.command.debug       # /mw debug
multiworld.command.delete      # /mw delete
multiworld.command.duplicate   # /mw duplicate
multiworld.command.help        # /mw help
multiworld.command.info        # /mw info
multiworld.command.list        # /mw list
multiworld.command.load        # /mw load
multiworld.command.manage      # /mw manage
multiworld.command.rename      # /mw rename
multiworld.command.setlobby    # /mw setlobby
multiworld.command.setspawn    # /mw setspawn
multiworld.command.teleport    # /mw teleport
multiworld.command.unload      # /mw unload
```

All permissions default to `op`.

---

## Usage

### Commands

All commands start with `/multiworld` (`/mw`, `/wm`). Use `/mw help` in-game for the full list.

| Command | Aliases | Usage | Description |
| :--- | :--- | :--- | :--- |
| `/mw create` | `new`, `c` | `/mw create <name> [seed] [generator]` | Generates a new world. Seed defaults to random; generator defaults to `normal` |
| `/mw duplicate` | `dp` | `/mw duplicate <world> [newName]` | Clones a world under a new name (defaults to `<world>_copy`) |
| `/mw delete` | `remove`, `rm`, `del` | `/mw delete <world>` | Deletes a world and its files |
| `/mw load` | `ld` | `/mw load <world>` | Loads a generated but unloaded world |
| `/mw unload` | `uld` | `/mw unload <world>` | Unloads a currently loaded world |
| `/mw rename` | `rnm`, `rn` | `/mw rename <world> <newName>` | Renames a world's folder and stored level data |
| `/mw teleport` | `tp` | `/mw teleport <world> [player]` | Teleports yourself or a target player to the world's spawn |
| `/mw list` | `ls`, `l` | `/mw list` | Lists every world, including unloaded ones |
| `/mw info` | `i` | `/mw info` | Shows information about the world you're standing in (in-game only) |
| `/mw manage` | `mng`, `m` | `/mw manage` | Opens a form to run any of the above without typing commands |
| `/mw setlobby` | `lobby` | `/mw setlobby` | Sets the server's default world and spawn to your current position |
| `/mw setspawn` | `spawn` | `/mw setspawn` | Sets the current world's spawn to your position |
| `/mw debug` | — | `/mw debug` | Prints your current chunk position and biome (in-game only) |
| `/mw help` | `?` | `/mw help [page]` | Lists all MultiWorld commands |

### Generators

Pass any of these names to `/mw create`:

| Name | Aliases | Description |
| :--- | :--- | :--- |
| `normal` | `classic`, `basic`, `vanilla` | Vanilla-ported Overworld generator with full biome support |
| `nether` | `hell` | Vanilla-ported Nether generator |
| `end` | `ender` | Ender/End generator |
| `void` | `empty`, `emptyworld` | Empty world with no terrain |
| `skyblock` | `sb` | Generates a starter SkyBlock island |
| `flat` | `superflat` | PocketMine's built-in flat generator |
| `normal_old` | — | PocketMine's built-in Normal generator (simpler terrain) |
| `nether_old` | — | PocketMine's built-in Nether generator (no glowstone/quartz ore) |

---

## Architecture

```
src/
└── czechpmdevs/multiworld/
    ├── MultiWorld.php                 # Main plugin class
    ├── command/
    │   ├── MultiWorldCommand.php      # Base command, registers all subcommands
    │   └── subcommand/                # One class per /mw subcommand
    ├── generator/
    │   ├── ender/                     # Ender/End generator
    │   ├── skyblock/                  # SkyBlock generator & populator
    │   └── void/                      # Void generator
    └── util/
        ├── ConfigManager.php          # Config loading & versioning
        ├── LanguageManager.php        # Per-player language resolution
        └── WorldUtils.php             # World lookup, generator resolution, duplication
```

---

## Adding a Language

1. Open the [language resource folder](resources/languages)
2. Copy `en_US.yml` and translate its values into your language
3. Save it as `<your_locale>.yml` in the same folder
4. Open a pull request

---

## Credits

**Original plugin**
- [MultiWorld](https://github.com/CzechPMDevs/MultiWorld) by [CzechPMDevs](https://github.com/CzechPMDevs) — this project is built on top of their work. All original commands, generators and architecture credit them.

**Icon**
- Icon made by [Freepik](http://www.freepik.com/ "Freepik") from [www.flaticon.com](https://www.flaticon.com/ "Flaticon") is licensed by [CC 3.0 BY](http://creativecommons.org/licenses/by/3.0/ "Creative Commons BY 3.0")

**Vanilla (Overworld & Nether) generators**
- Generators translated from Glowstone project to PocketMine by @Muqsit

**Translations**
- Japanese translation by [fuyutsuki](https://github.com/fuyutsuki)
- Russian translation by [SteinsSquad (themestl)](https://github.com/themestl)
- Indonesian translation by [WooWBoom](https://github.com/GitWoow) and [keenanyafiqy](https://github.com/keenanyafiqy)
- German translation by [SchdowNVIDIA](https://github.com/SchdowNVIDIA) and [Tobikisss](https://github.com/Tobikisss)
- Chinese translation by [abc1460132901](https://github.com/abc1460132901) and [AZ1IDJC](https://github.com/Blackjack200)
- Vietnamese translation by [NhanAZ](https://github.com/NhanAZ)
- Spanish translation by [MrBlastyMSK](https://github.com/MrBlasyMSK)
- French translation by wrathx, [Hydros01](https://github.com/Hydros01)
- Thai translation by [KohakuChanX](https://github.com/Kuuuuuuuu)

---

## License

This project is licensed under **GPL-3.0**, same as the original MultiWorld, and remains so per the terms of that license.

```
BetterMultiWorld - PocketMine plugin that manages worlds.
Based on MultiWorld, Copyright (C) 2018 - 2023 CzechPMDevs
Modifications Copyright (C) 2026 Phoenix4041

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <https://www.gnu.org/licenses/>.
```

Full license text: [LICENSE](LICENSE). Original project: [CzechPMDevs/MultiWorld](https://github.com/CzechPMDevs/MultiWorld).

---

## Support

For issues, feature requests, or questions, open an [Issue](https://github.com/Phoenix4041/BetterMultiWorld/issues) on this repository.

---

**Maintained by Phoenix4041**
