# Lodgepole

Lodgepole is an offshoot of the Jackpine starter theme for WordPress.  
Changes made here will be integrated into Jackpine in the future.

## Requirements

- PHP >= 7.4
- Node.js >= 12
- WordPress >= 5.3
- Composer
- Yarn Classic

## Usage

### Clone & Setup

```shell script
# Clone the repository
$ git clone https://github.com/aedontanner/lodgepole.git

# Install dependencies
$ composer install && yarn install

# Create development server config
$ yarn run bootstrap
```

### Start development server

```shell script
$ yarn run start
```

### Build for production

```shell script
# Compile assets
$ yarn run build

# Create ZIP file
$ yarn run archive
```

## Folder structure

- `assets` - Stylesheets, scripts, images, etc.
- `templates` - Timber Twig templates
- `theme` - WordPress-specific files

## Acknowledgments

Huge thanks to the folks who made the tools that Lodgepole is built on:

- [Timber](https://github.com/timber/timber)
- [wpack.io](https://github.com/swashata/wp-webpack-script)
- And others.

## License

This software is released under the MIT License.  
See the LICENSE file for details.
