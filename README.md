# FloatingTexter

Make floating texts in your server, in your world, at your conditions.

Version 2.0 // PocketMine API 2.0.0

## Usage
This plugin doesn't have commands or permissions, it only has a simple config file.

### Editing the config file

```

---
# Example config file n. 1
test:
  x: 0                              # The X position of the floating text
  "y": 128                          # The Y position of the floating text
  z: 0                              # The Z position of the floating text
  level: "world"                    # The level where the floating text will be placed
  text: "Welcome to the server! :)" # The text inside the floating text
...

```
#### Formatting codes

You can use `§x` formatting codes in the text and `\n` for a new line in the floating text.

```

---
# Example config file n. 2
test:
  x: 0
  "y": 128
  z: 0
  level: "world"
  text: "§eWelcome to the server!\nEnjoy! :)"
...

```

This config file will output a floating text with this yellow text inside:
```
Welcome to the server!
Enjoy! :)
```

# Credits

FloatingTexter was originally made by Heromine/Jon. It was rewritten by AryToNeX.
As always contributions are welcome.