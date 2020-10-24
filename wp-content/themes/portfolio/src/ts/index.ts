require('../css/main.scss');

import { AdjustAdminBar } from './adjust-admin-bar';
import { BlogScrollIndicator } from './blog-scroll-indicator';
import { DarkModeSwitch } from './dark-mode-switch';

export const app = {
  adjustAdminBar: new AdjustAdminBar(),
  blogScrollIndicator: new BlogScrollIndicator(),
  darkModeSwitch: new DarkModeSwitch(),
}